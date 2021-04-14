<div class="card project_widget">
    <div class="header p-4">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h2>Exam lists</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                <!-- <h2><a href="" style="color: #5b626b;"><i class="material-icons" style="font-size: 18px;">mode_edit</i> Edit</a></h2> -->
                {{ $exams->count() }} records found
            </div>
        </div>
    </div>
    <hr class="m-0">
    <div class="body p-4">
        @if(count($exams) != 0 )
        @php
        $sn = $exams->firstItem();
        @endphp
        @foreach($exams as $key => $exam)
        <strong class="mr-2">{{ $sn++ }}.</strong>
        <strong> <a href="{{ url('exam/'.$exam->slug) }}">{{ $exam->name }}</a></strong>
        <hr>
        @endforeach
        <div id="pagination" class="mx-auto">
            {!! $exams->links() !!}
        </div>
        @endif
        @if(count($exams) == 0 )
        No records found.
        @endif
    </div>
</div>