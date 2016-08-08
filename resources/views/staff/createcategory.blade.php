                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('createcategory') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input type="text" placeholder="Category Name"class="form-control" name="name" value="{{ old('name') }}"></br>
                    
                                <textarea class="form-control" placeholder="Category-description"cols="50" rows="10" name="description"></textarea></br>
        
                                <input type="file"placeholder="Product Image"class="form-control" name="categoryPhoto" value="{{ old('categoryPhoto') }}"></br>
                                @if($errors->has('categoryPhoto'))<p style="color:red">{{$errors->first('categoryPhoto')}}</p>@endif
                    
                                <button type="submit" class="btn btn-primary">
                                    Add Category
                                </button>
                         
                    </form>

<h2>Add Featured Products</h2>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('fproducts') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                             <select id="catId"name='catId'class="form-control" placeholder="Features Products" multiple>
                                 
                                     @foreach($cats as $cat)
                                 
                                     <option value='{{$cat->id}}'>{{$cat->name}}</option></br>
                                      
                                     @endforeach                  
                                   </select></br>
                    
                                <button type="submit" class="btn btn-primary">
                                    Features Product
                                </button>
                         
                    </form>