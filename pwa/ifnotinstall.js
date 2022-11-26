window.deferredPrompt = {};
const install_button = document.querySelector('#install');
window.addEventListener('beforeinstallprompt', e => {
  e.preventDefault();
  window.deferredPrompt = e;
    const Toast = Swal.mixin({
        toast: true,
        position: 'TOP_CENTER',
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: "Şimdi Kur",
        cancelButtonText: "Daha Sonra",
        timerProgressBar: false,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    Toast.fire({
    icon: 'success',
    width: '100%',
    title: 'EstetikPanel Uygulaması Hazır'
    }).then((result) => {
        if (result.isConfirmed) {
            window.deferredPrompt.prompt();
            window.deferredPrompt.userChoice.then(choiceResult => {
            if (choiceResult.outcome === 'accepted') {
            } else {
                console.log('User dismissed the prompt');
            }
            window.deferredPrompt = null;
            });
        }
    });
});
if (window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone === true) {
  Swal.close();
}
window.addEventListener('appinstalled', e => {
  console.log("success app install!");
});