<!-- Modal -->
<div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="category_name_update">Category Name</label>
                        <input type="text" class="form-control" id="category_name_update"
                               placeholder="Enter category name" value="">
                        <input type="hidden" id="category_id_update_val">
                        <input type="hidden" id="category_type">
                        <input type="hidden" id="cat_pro_id">
                        <input type="hidden" id="cat_coll_id">
                        <input type="hidden" id="cat_blogs_id">
                        <input type="hidden" id="cat_pages_id">
                    </div>
                    <div class="form-group">
                        <label for="select_icon">Select Category icon</label>
                        <select class="form-control" id="select_icon_update">
                            @foreach($font_awesome as $font_awesomes)
                                <option value="{{$font_awesomes->icon_class_name}}" <?php echo $font_awesomes->
                                icon_class_name?'checked':'' ?>><i style="font-size:24px"
                                                                   class="fa">{!!$font_awesomes->icon_code!!}</i></option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="enable_text">Hide Category Name</label>
                        <label class="switch">
                            <input type="checkbox" class="hide_cat_name_update">
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="enable_text">Enable Tab And Product Page</label>
                        <label class="switch">
                            <input type="checkbox" class="ena_pro_page_update">
                            <span class="slider round"></span>
                        </label>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_faq_opt_update">Save changes</button>
            </div>
        </div>
    </div>
</div>