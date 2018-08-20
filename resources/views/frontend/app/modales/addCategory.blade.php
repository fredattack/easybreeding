

        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><strong>Add</strong> a category</h4>
                <button type="button" class="close" data-dismiss="card" aria-hidden="true">&times;</button>
            </div>
            <div class="card-body">
                <form role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Category Name</label>
                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                        </div>
                        <div class="col-md-6">
                            <span>
                                <label class="control-label">Choose Category</label>
                                <button class="btn btn-lg btn-table"><i class="fa fa-plus"></i></button>
                            </span>
                            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                <option value="success" style="color:{{\Setting::get('category.'.'default')}}">&#xf192 default</option>
                                <option value="success" style="color:{{\Setting::get('category.'.'laying')}}">&#xf192 laying</option>
                                <option value="success" style="color:{{\Setting::get('category.'.'nestling')}}">&#xf192 nestling</option>
                                <option value="success" style="color:{{\Setting::get('category.'.'controlFecundity')}}">&#xf192 controlFecundity</option>

                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>