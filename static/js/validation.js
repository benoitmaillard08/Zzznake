$('.ui.form.up')
  .form({
    inline : true,
    on: 'blur',
    fields: {
      lastname: {
        identifier  : 'lastname',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a value'
          }
        ]
      },
      firstname: {
        identifier  : 'firstname',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a value'
          }
        ]
      },
      email: {
        identifier  : 'email',
        rules: [
          {
            type   : 'email',
            prompt : 'Please enter a valid e-mail'
          }
        ]
      },
      username: {
        identifier  : 'username',
        rules: [
          {
            type   : 'regExp[/^[a-z0-9_-]{4,14}$/]',
            prompt : 'Please enter a 4-14 letter username'
          }
        ]
      },
      password1: {
        identifier  : 'password1',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a value'
          },
                    {
            type   : 'regExp[/^.{6,}$/]',
            prompt : 'Please enter at least 6 characters'
          }
        ]
      },
      password: {
        identifier  : 'password2',
        rules: [
          {
            type   : 'match[password1]',
            prompt : 'Please put the same value in both fields'
          },
          {
            type   : 'empty',
            prompt : 'Please enter a value'
          }
        ]
      }

    }
  });

$('.ui.form.in')
  .form({
    inline : true,
    on: 'blur',
    fields: {
      username: {
        identifier  : 'username_login',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a value'
          }
        ]
      },
      password: {
        identifier  : 'password_login',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a value'
          }
        ]
      }
    }
  });