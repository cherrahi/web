$(document).ready(function() {
    $('#bmiForm').submit(function(e) {
        e.preventDefault();  // منع إرسال النموذج بشكل تقليدي

        // الحصول على القيم المدخلة
        var name = $('#name').val().trim();
        var weight = parseFloat($('#weight').val());
        var height = parseFloat($('#height').val());

        // التحقق من صحة البيانات المدخلة
        if (name === "" || isNaN(weight) || isNaN(height) || weight <= 0 || height <= 0) {
            $('#result').html('<div class="alert alert-warning">Please enter valid values in all fields.</div>');
            return;
        }

        // إرسال البيانات عبر AJAX
        $.ajax({
            url: 'calculate.php',   // إرسال البيانات إلى ملف PHP
            type: 'POST',
            data: { name: name, weight: weight, height: height },
            dataType: 'json',       // استلام البيانات بصيغة JSON
            success: function(response) {
                // تأكد أن الكود داخل الدالة success فقط
                console.log(response);  // هذا السطر سيعرض الاستجابة في الـ Console فقط إذا كانت الاستجابة ناجحة
                
                if (response.success) {
                    var alertClass = 'alert-info';
                    
                    if (response.bmi < 18.5) {
                        alertClass = 'alert-warning';
                    } else if (response.bmi < 25) {
                        alertClass = 'alert-success';
                    } else if (response.bmi < 30) {
                        alertClass = 'alert-info';
                    } else {
                        alertClass = 'alert-danger';
                    }

                    // عرض النتيجة في واجهة المستخدم
                    $('#result').html('<div class="alert ' + alertClass + '">' + response.message + '</div>');
                } else {
                    $('#result').html('<div class="alert alert-danger">' + response.message + '</div>');
                }
            },
            error: function() {
                $('#result').html('<div class="alert alert-danger">Server error occurred.</div>');
            }
        });
    });
});