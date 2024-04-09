<!-- Modal -->
<div class="modal fade" id="faqModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Faq Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="form-group">
                        <label for="faq_category" class="col-form-label">Faq`s Category</label>
                        <input type="text" name="faq_category" class="form-control" id="faq_category" readonly>
                        <input type="hidden" name="faq_category_id" class="form-control" id="faq_category_id">
                    </div>
                    <div class="form-group">
                        <label for="faq_questions" class="col-form-label">Faq`s Questions</label>
                        <input type="text" name="faq_questions" class="form-control" id="faq_questions">
                    </div>
                    <div class="form-group">
                        <label for="faq_slug" class="col-form-label">Faq`s Slug</label>
                        <input type="text" name="faq_slug" class="form-control" id="faq_slug">
                    </div>
                    <div class="form-group">
                        <label for="faq_close_icon" class="col-form-label">Faq`s Close icon</label>
                        <select name="faq_close_icon" id="faq_close_icon" class="form-control">
                            <option value="fa fa-arrow-down"><i style="font-size:24px" class="fa">&#xf063;</i>
                            </option>
                        </select>
                        <!-- <input type="text" name="faq_close_icon" class="form-control" id="faq_close_icon"> -->
                    </div>
                    <div class="form-group">
                        <label for="faq_open_icon" class="col-form-label">Faq`s Open icon</label>
                        <select name="faq_open_icon" id="faq_open_icon" class="form-control">
                            <option value="fa fa-arrow-right"><i style="font-size:24px" class="fa">&#xf061;</i>
                            </option>
                        </select>
                        <!-- <input type="text" name="faq_open_icon" class="form-control" id="faq_open_icon"> -->
                    </div>
                    <div class="form-group">
                        <label class="enable_text">Enable Tab on Product Page</label>
                        <label class="switch">
                            <input type="checkbox" class="toggle_active_deactive" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div>
                        <label for="faq_ans">Faq Answer</label>
                        <textarea class="w-full form-control faqAnsData"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_faq">Save changes</button>
            </div>
        </div>
    </div>
</div>