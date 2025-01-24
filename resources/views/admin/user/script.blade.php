<script src="{{ URL::asset('js/ajax.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.detailUser').on('click', function(res){
            res.preventDefault();
            let id = $(this).data('id');
            getAjaxById("user" + "/" + id, "detailUserModal",function(result){
                $('#modal_title').html("Create User");
                $('#detail_id').val(result.data.id);
                $('#detail_username').val(result.data.username);
                $('#detail_phone').val(result.data.phone);
                $('#detail_email').val(result.data.email);
                $('#detail_saldo').val(result.data.saldo);
                $('#detail_level').val(result.data.level);
                $('#detail_status').val(result.data.status);
            })
        }); 
        
    });
</script>