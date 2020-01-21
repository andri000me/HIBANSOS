<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{base_url('uploadlpj/'.$idHibahBansos)}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="md-form">
                                <input type="text" name="linkYoutube" placeholder="Link youtube" id="form1" class="form-control">
                                <label for="form1">Wajib di isi</label>
                            </div>
                            <div class="md-form">
                                <textarea id="form7" placeholder="Keterangan" name="keterangan" class="md-textarea form-control" rows="3"></textarea>
                                <label for="form7">Wajib di isi</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <small class="d-block">
                                Harap upload lpj kegiatan anda
                            </small>
                            <small class="{{isset($formerror['fileProposal']) ? "text-danger":"text-muted"}} font-smaller">
                                {{isset($formerror['fileProposal'])?$formerror['fileProposal'] : "Wajib di isi"}}
                            </small>
                            <div class="custom-file">
                                <input name="fileLPJ" accept="application/pdf" type="file"  class="custom-file-input" id="proposal" lang="in">
                                <label class="custom-file-label " for="proposal">File lpj</label>
                            </div>
                            <span class="d-inline-block" title="pilih file terlebih dahulu" tabindex="0" data-toggle="tooltip">
                            <button id="form-btn"  disabled class="mx-0 btn btn-sm btn-main-2" data-toggle="tooltip" data-placement="top">
                               <i class="fas fa-cloud-upload-alt"></i> Upload lpj
                            </button>
                        </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script type="application/javascript" src="{{base_url('assets/js/useraction.js')}}"></script>
@stop