<!--edit or create Modal-->
<div class="modal" id="general-modal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 9999">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-title"></h4>
      </div>
      <div id="content-modal">
        <!--content load -->
      </div>
    </div>
  </div>
</div>
<!-- /.modal --> 

<!--Sign Out Dialog Modal-->
<div class="modal" id="signout">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><i class="fa fa-lock"></i> </div>
      <div class="modal-body text-center">@lang('app.are_you_sure_sign_out')</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="yesigo">@lang('app.yes')</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('app.close')</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 
