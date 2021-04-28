<div class="card project_widget">
    <div class="header p-4">
        <h2>Current Affair Filter</h2>
    </div>
    <hr class="m-0">
    <div class="formCard">
        <div class="wrapper">
            <div class="body p-4">

                <div class="row pr-4">
                    <div class="col-lg-12">
                        {{Form::date('date', '', ['class' => 'squareInput currentsearch', 'id' => 'affairdate'])}}
                        {{Form::label('date', 'Select Date'), ['class' => 'active']}}
                    </div>

                    <div class="col-lg-12">
                        {{Form::select('category_id', $currentaffaircategoryArr,'', ['class' => 'squareInput des-select form-control currentsearch', 'id' => 'affaircategory'])}}
                        {{Form::label('category_id', 'Select Category'), ['class' => 'active']}}
                    </div>
                </div>
                <span id="affairUrl" data-url="{{ route('search') }}"></span>
                <span id="affairPdfUrl" data-url="{{ route('pdf') }}"></span>

                <!-- <div class="text-right">
                    <input type="submit" class="btn btn-primary" value="Export Pdf" />
                </div> -->
            </div>
        </div>
    </div>
</div>