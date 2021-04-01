document.querySelector('form').addEventListener('input', function (e) {
  const password = document.querySelector('#password');
  const cpassword = document.querySelector('#cpassword');

  cpassword.setCustomValidity(
    cpassword.value != password.value ? 'Password tidak sesuai.' : ''
  );
});

document.querySelector('#nik').addEventListener('mousewheel', function (e) {
  e.preventDefault();
  this.blur();
});
