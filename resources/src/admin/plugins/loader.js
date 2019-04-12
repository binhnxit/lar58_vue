import 'blockui'

$.blockUI.defaults = {
  message: '<i class="icon-spinner2 spinner"></i>',
  overlayCSS: {
    backgroundColor: '#fff',
    opacity: 0.8,
    cursor: 'wait',
    'box-shadow': '0 0 0 1px #ddd'
  },
  css: {
    width: '100%',
    height: '100%',
    border: 0,
    padding: 0,
    backgroundColor: '#000',
    opacity: 0.4,
    textAlign: 'center',
    color: '#fff'
  }
}