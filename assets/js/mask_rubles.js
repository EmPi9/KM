$(document).ready(function() {
    $('#price_request').on('input', function() {
        var value = $(this).val();
        value = value.replace(/\D/g, ''); // Удаляем все нечисловые символы
        $(this).val(value);

        if (value !== '') {
            // Добавляем символ рубля после ввода числа
            $('.currency-symbol').css('visibility', 'visible');
        } else {
            $('.currency-symbol').css('visibility', 'hidden');
        }
    });
});