// Авторизация
$('.login-btn').click(function (e) {
    e.preventDefault();
    
    $(`input`).removeClass("error");

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: "vendor/signin.php",
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success(data) {
            if (data.status) {
                document.location.href = "index.php";
            } else {
                $('.msg').addClass("py-2 px-2 none");
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass("error");
                    });
                }
                $('.msg').removeClass("none").text(data.message);
            }
        }
    });
});

// Регистрация
$('.register-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass("error");

    let login = $('input[name="login"]').val(),
    email = $('input[name="email"]').val(),
    name = $('input[name="name"]').val(),
    password = $('input[name="password"]').val(),
    password_confirm = $('input[name="password_confirm"]').val();

    let formData = new FormData();
    formData.append('login', login);
    formData.append('email', email);
    formData.append('name', name);
    formData.append('password', password);
    formData.append('password_confirm', password_confirm);

    $.ajax({
        url: "vendor/signup.php",
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success(data) {
            if (data.status) {
                location.href = "index.php";
            } else {
                $('.msg').addClass("py-2 px-2 none");
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass("error");
                    });
                }
                $('.msg').removeClass("none").text(data.message);
            }
        }
    });
});