@extends('welcome')
@section('content')
    <input type="hidden" id="shop_name" value="{{$shop}}">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button" id="button-addon2">Search</button>
        </div>
    </div>
    <table class="table display table-bordered table-striped bordered">
        <thead>
        <tr>
            <th>Sr No.</th>
            <th>Icon</th>
            <th>Category Name</th>
            <th>Type</th>
            <th>Status</th>
            <th>Actions</th>
            <th style="display: none">Reorder</th>
        </tr>
        </thead>
        <tbody>
        @foreach($save_data_det as $data)
            <tr class="drp">
                <td>{{$loop->iteration}}</td>
                <td id="cat_id{{$data->id}}" style="display:none">{{$data->id}}</td>
                <td><i class="fa {{$data->select_icon}}"></i></td>
                <td id="tduid">{{$data->category_name}}</td>
                <td>{{$data->type ?? 'NA'}}</td>
                <td>
                    <div class="form-check">
                        @if($data->ena_pro == 1)
                            <label class="switch">
                                <input type="checkbox" class="toggle_check" checked
                                       data-id="{{$data->pro_valll_id}}">
                                <span class="slider round"></span>
                            </label>
                        @else
                            <label class="switch">
                                <input type="checkbox" class="toggle_check"
                                       data-id="{{$data->pro_valll_id}}">
                                <span class="slider round"></span>
                            </label>
                        @endif
                    </div>
                </td>
                <td>
                    <a href="#" class="edit_category " data-id="{{$data->id}}"
                       data-name="{{$data->category_name}}" data-icon="{{$data->select_icon}}"
                       data-hideca="{{$data->hide_cat}}" data-enablepro="{{$data->ena_pro}}"
                       data-type="{{$data->type}}" data-proid="{{$data->pro_valll_id}}"
                       data-collid="{{$data->collection_val_id}}"
                       data-blogsid="{{$data->blogs_val_id}}"
                       data-pagesid="{{$data->save_page_id}}" data-toggle="modal"
                       data-target="#exampleModalUpdate"><i class="fa fa-edit mx-4"></i></a>
                    <a href="#" data-id="{{$data->id}}" class="del_category"><i
                                class="fa fa-trash mx-4 text-danger"></i></a>
                    <i class="fa fa-plus text-primary mx-4 expandRow" data-target="#expanedRow_<?= $loop->iteration; ?>"></i>
                </td>
            </tr>
            <tr class="expandable-row" id="expanedRow_<?= $loop->iteration; ?>" style="display: none;">
                <td colspan="7">
                    @if(in_array($data->category_name, $categories))
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>FAQ Ques</th>
                                <th>FAQ Slug</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faqCategories as $faq)
                                @if($faq->category_name == $data->category_name)
                                    <tr>
                                        <td>{{$faq->category_name}}</td>
                                        <td>{{$faq->faq_qus}}</td>
                                        <td>{{$faq->faq_slug}}</td>
                                        <td>{{$faq->faq_ans}}</td>
                                        <td>
                                            <a href="#" class="append_data faq_update pointer" data-id="{{$faq->id}}"
                                               data-cid="{{$faq->category_id}}" data-name="{{$faq->category_name}}"
                                               data-qus="{{$faq->faq_qus}}" data-slug="{{$faq->faq_slug}}"
                                               data-enable="{{$faq->faq_product_enable}}" data-ans="{{$faq->faq_ans}}"
                                               data-toggle="modal" data-target="#faqUpdateModal"
                                            ><i class="fa fa-edit mx-4"></i></a>
                                            <a href="#" data-id="{{$data->id}}" class="del_category"><i
                                                        class="fa fa-trash mx-4 text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary" data-target="#faqModal" data-toggle="modal">Add More FAQ Questions</button>
                    @else
                        <button type="button" class="btn btn-primary" data-target="#faqModal" data-toggle="modal">Add More FAQ Questions</button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @include('modal.faq_ques')
    @include('modal.faq_qus_update')
    @include('modal.faq_cat')
@endsection
