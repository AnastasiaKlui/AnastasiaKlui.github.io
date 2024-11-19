$(document).ready(function () {
    $("#registrationForm").validate({
        rules: {
            name: {
                required: true,
                pattern: /^[A-Za-zА-Яа-яЁёІіЇїЄє]+$/,
            },
            age: {
                required: true,
                number: true,
                min: 1,
            },
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            name: {
                required: "Поле 'Ім'я' обов'язкове.",
                pattern: "Ім'я повинно містити лише літери.",
            },
            age: {
                required: "Поле 'Вік' обов'язкове.",
                number: "Вік має бути числом.",
                min: "Вік має бути додатнім числом.",
            },
            email: {
                required: "Поле 'Електронна пошта' обов'язкове.",
                email: "Введіть правильну електронну пошту.",
            },
        },
        submitHandler: function (form) {
            alert("Форма успішно подана!");
            form.submit();
        },
    });
});
