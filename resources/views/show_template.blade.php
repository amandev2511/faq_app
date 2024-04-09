@include('includes.header')
<table class="display" id="template">
    <thead>
        <tr>

            <th>Sr.No</th>
            <th>Tempate Name</th>
            <th>Action</th>
            <th></th>

        </tr>
    </thead>
    <tbody>
        @foreach($template as $templates)
        
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>Template - {{ $loop->iteration }}</td>
            <td><a href="{{url('edit/template', ['shop' => $templates['shop_name'], 'id' => $templates['id']])}}" class="template_edit" data-id="{{$templates['id']}}"><i class="fa fa-edit"></i></a></td>
            <td><a href="javascript:void(0)" class="template_del" data-id="{{$templates['id']}}"><i class="fa fa-trash"></i></a></td>
        </tr>
        @endforeach
    </tbody>
    @include('includes.footer')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#template').DataTable({
            dom: 'l<"toolbar">frtip',
                initComplete: function () {
                    $("div.toolbar")
                        .html('<a href="{{ route('create_template', ['shop' => $shop]) }}">Create template</a>');
                },
        });
        
        $('.template_del').click(function(){
           var template_id = $(this).attr('data-id');
           $.ajax({
                    type: "GET",
                    url: "{{url('delete/template')}}" + "/" + template_id,
                    success: function (response) {
                        alert('Template has been delete successfully');
                        location.reload();
                    },
                    error: function (error) {
                        alert('Something went wrong');
                    }
                });
        })

    });
</script>