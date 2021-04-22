<div class="card project_widget">
    <div class="header p-4">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h2>Current Affairs</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                <!-- <h2><a href="" style="color: #5b626b;"><i class="material-icons" style="font-size: 18px;">mode_edit</i> Edit</a></h2> -->
                {{ $currentaffair->count() }} records found
            </div>
        </div>
    </div>
    <hr class="m-0">
    <div class="body acc">
        @php
        $sn = 1;
        @endphp
        @if(count($currentaffair) != 0 )
        <div class="grid-l1">
            @foreach($currentaffair as $key => $ca)
            <div class="box-a1">
                <div class="header">
                    {{ $sn++ }}. {{ $ca->title }}
                </div>

                <div class="level-box" style="@if($key == 0) display: block @endif">
                    @if($ca->image)
                    <div class="card-image">
                        <a href="{{ url('currentaffair/detail/'.$ca->slug) }}"><img src="{{ url('storage/currentaffair/'.$ca->image) }}" alt="{{ $ca->image }}" width="100%"></a>
                    </div>
                    @else
                    @endif
                    <div class="mt-4"></div>
                    <span class="three-line">{!! $ca->except_text !!}</span>
                    <div style="float:right;">
                        <a href="{{ url('currentaffair/detail/'.$ca->slug) }}">Read More...</a>
                    </div>
                    <hr class="m-0 p-0">
                </div>
            </div>
            @endforeach
        </div>
        @if(isset($status))
        <div class="d-flex justify-content-between">
            <div id="pagination">
                {!! $currentaffair->links() !!}
            </div>
            <div class="text-right" style="padding-top: 25px;">
                <h5>
                    <button type="submit" class="btn btn-outline-danger btn-border-radius"><i class="material-icons" style="font-size: 18px;">picture_as_pdf</i><span>Export PDF</span></button>
                </h5>
            </div>
        </div>
        @endif
        @endif
        @if(count($currentaffair) == 0 )
        No records found.
        @endif
    </div>
</div>