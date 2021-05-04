<div class="card project_widget">
    <div class="header p-4">
        <h2>Questions Filter</h2>
    </div>
    <hr class="m-0">
    <div class="formCard">
        <div class="wrapper">
            <div class="body p-4">

                <div class="row pr-4">
                    <div class="col-lg-12">
                        {{Form::select('difficulty', $difficulty, request('difficulty'), ['class' => 'squareInput des-select form-control questionsearch', 'id' => 'questiondifficulty'])}}
                        {{Form::label('Difficulty', 'Choose Difficulty'), ['class' => 'active']}}
                    </div>

                    <div class="col-lg-12">
                        {{Form::select('category_id', $examcategoryArr, request('category_id'), ['class' => 'squareInput des-select form-control questionsearch', 'id' => 'questioncategory'])}}
                        {{Form::label('category_id', 'Select Category'), ['class' => 'active']}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>