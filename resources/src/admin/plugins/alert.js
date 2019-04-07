import Swal from 'sweetalert2'
import 'sweetalert2/src/sweetalert2.scss'

let options = {
  position: 'top-end',
  showConfirmButton: false,
  timer: 2000,
  toast: true,
}

export default Swal.mixin(options)
