


/* Model HandleUser */
$(document).ready(function() {
    $(document).on('click', '#btnDelete ', function() {
        var role = $(this).val();
        $('#deletetModal').modal('show')
        $('#deleteid').val(role);
    });
});


/* $(document).ready(function() {
    $(document).on('click', '#btn_dalete ', function() {
        var users_id = $(this).val();
        $('#deletetModal').modal('show')
        $('#delete_id').val(users_id);
    });
});
 */

$(document).ready(function() {
    $(document).on('click', '#btn_dalete ', function() {
        var promo_id = $(this).val();
        $('#deletetModal').modal('show')
        $('#deleteid').val(promo_id);
    });
});

/* Update Photo Post , Promotaional*/
$(document).ready(function() {
    $('.upload-container').add('.upload-btn').click(function() {
        $('#upload-input').trigger('click');
    });

    $('#upload-input').change(event => {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = () => {
            $('.upload-text').text(file.name);
            $('.upload-img img').attr('aria-label', file.name);
            $('.upload-img img').attr('src', reader.result);

        }
    })

});

/* Update Logo*/
$(document).ready(function() {
    $('.upload-container').add('.upload-btn').click(function() {
        $('#upload-logo').trigger('click');
    });

    $('#upload-logo').change(event => {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = () => {
            $('.upload-text').text(file.name);
            $('.upload-imageLogo img').attr('aria-label', file.name);
            $('.upload-imageLogo img').attr('src', reader.result);

        }
    })

});
/* Update Favaicon */
$(document).ready(function() {
    $('.upload-container').add('.upload-logo ').click(function() {
        $('#upload-Favaicon').trigger('click');
    });

    $('#upload-Favaicon').change(event => {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = () => {
            $('.upload-text').text(file.name);
            $('.upload-imageFavaicon img').attr('aria-label', file.name);
            $('.upload-imageFavaicon img').attr('src', reader.result);

        }
    })

});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#blah')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}


function UsCurrency(input) {
    // Get the input value and remove any non-numeric characters
    let inputValue = input.value.replace(/[^0-9.]/g, '');

    // Format the number as currency using toLocaleString()
    let formattedValue = parseFloat(inputValue).toLocaleString('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    });

    // Update the input value with the formatted currency
    input.value = formattedValue;
}

function KhCurrency(input) {
    // Get the input value and remove any non-numeric characters
    let inputValue = input.value.replace(/[^0-9.]/g, '');
    // Format the number as currency using toLocaleString()
    let formattedValue = parseFloat(inputValue).toLocaleString('en-KH', {
        style: 'currency',
        currency: 'KHR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
    });

    // Update the input value with the formatted currency
    input.value = formattedValue;
}


/* Handle Checkbox Seledct all */

$('#select-all').click(function() {
    $('input[type="checkbox"]').prop('checked', this.checked);
});
$(document).ready(function() {
    $(document).on('click', '#btnDelete ', function() {
        var Courses_Category = $(this).val();
        $('#deletetModal').modal('show')
        $('#deleteid').val(Courses_Category);
    });
});
$(document).ready(function() {
    $(document).on('click', '#btnSelcetAll', function() {
        var selecet_All = $(this).val();
        $('#selectAll').modal('show')
        $('#selectid').val(selecet_All);
    });
});

