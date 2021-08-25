        (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
        $('#example').DataTable();
        $('#example1').DataTable();
        function delete_customer(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            $.ajax({
                url:"{{ route('deletecustomer') }}",
                type:"POST",
                data:{ id: id},      
                dataType:"json",
                success:function(result){
                    location.reload();      
                },    
            });
        }