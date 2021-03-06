weForms.routeComponents.Tools = {
    template: '#tmpl-wpuf-tools',
    mixins: [weForms.mixins.Tabs, weForms.mixins.Loading],
    data: function() {
        return {
            activeTab: 'export',
            exportType: 'all',
            loading: false,
            forms: [],
            importButton: 'Import',
            currentStatus: 0,
            responseMessage: '',
            ximport: {
                current: '',
                title: '',
                action: '',
                message: '',
                type: 'updated',
                refs: {}
            }
        };
    },

    computed: {

        isInitial: function() {
            return this.currentStatus === 0;
        },

        isSaving: function() {
            return this.currentStatus === 1;
        },

        isSuccess: function() {
            return this.currentStatus === 2;
        },

        isFailed: function() {
            return this.currentStatus === 3;
        },

        hasRefs: function() {
            return Object.keys(this.ximport.refs).length;
        }
    },

    created: function() {
        this.fetchData();
    },

    methods: {
        fetchData: function() {
            var self = this;

            this.loading = true;

            wp.ajax.send( 'weforms_form_names', {
                data: {
                    _wpnonce: weForms.nonce
                },
                success: function(response) {
                    // console.log(response);
                    self.loading = false;
                    self.forms   = response;
                },
                error: function(error) {
                    self.loading = false;
                    alert(error);
                }
            });
        },

        importForm: function( fieldName, fileList, event ) {
            if ( !fileList.length ) {
                return;
            }

            var formData = new FormData();
            var self = this;

            formData.append( fieldName, fileList[0], fileList[0].name);
            formData.append( 'action', 'weforms_import_form' );
            formData.append( '_wpnonce', weForms.nonce );

            self.currentStatus = 1;

            $.ajax({
                type: "POST",
                url: window.ajaxurl,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    self.responseMessage = response.data;

                    if ( response.success ) {
                        self.currentStatus = 2;
                    } else {
                        self.currentStatus = 3;
                    }

                    // reset the value
                    $(event.target).val('');
                },

                error: function(errResponse) {
                    console.log(errResponse);
                    self.currentStatus = 3;
                },

                complete: function() {
                    $(event.target).val('');
                }
            });
        },

        importx: function(target, plugin) {
            var button = $(target);
            var self   = this;

            self.ximport.current = plugin;
            button.addClass('updating-message').text( button.data('importing') );

            wp.ajax.send( 'weforms_import_xforms_' + plugin, {
                data: {
                    _wpnonce: weForms.nonce
                },

                success: function(response) {
                    self.ximport.title   = response.title;
                    self.ximport.message = response.message;
                    self.ximport.action  = response.action;
                    self.ximport.refs    = response.refs;
                },

                error: function(error) {
                    alert(error.message);
                },

                complete: function() {
                    button.removeClass('updating-message').text( button.data('original') );
                }
            });
        },

        replaceX: function(target, type) {
            var button = $(target);
            var self   = this;

            button.addClass('updating-message');

            wp.ajax.send( 'weforms_import_xreplace_' + self.ximport.current, {
                data: {
                    type: type,
                    _wpnonce: weForms.nonce
                },

                success: function(response) {
                    if ( 'replace' === button.data('type') ) {
                        alert( response );
                    }
                },

                error: function(error) {
                    alert( error );
                },

                complete: function() {
                    self.ximport.current = '';
                    self.ximport.title   = '';
                }
            });
        }
    }
};
