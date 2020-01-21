@section('css')
    <link href="{{base_url('assets/css/addons/quill.snow.css')}}" rel="stylesheet" />
@stop
@section('script')
    <script type="application/javascript" src="{{base_url('assets/js/addons/quill.min.js')}}"></script>
    <script type="application/javascript">
        window.delta = @json($konten);
    </script>
    <script type="application/javascript" src="{{base_url('assets/js/pengaturan.tentang.js')}}"></script>
@stop
<div class="">
    <div class="text-right">
        <form action="{{base_url(uri_string())}}" method="post">
            <input type="hidden" id="tentang" name="tentang">
            <button id="save" disabled class="btn btn-sm bg-main1 mt-3 mx-0">
                <i class="fas fa-save"></i> Simpan perubahan
            </button>
        </form>
    </div>
    <div class="mt-3 flex-grow-1">
        <div id="quill-container" style="min-height: 50vh"></div>
    </div>
</div>