<div class="card project_widget">
    <div class="header p-4">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h2>Questions</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                <!-- <h2><a href="" style="color: #5b626b;"><i class="material-icons" style="font-size: 18px;">mode_edit</i> Edit</a></h2> -->
                {{ $question->count() }} records found
            </div>
        </div>
    </div>
</div>

<div class="row">
    @php
    $sn = 1;
    @endphp
    @if(count($question) != 0 )
    @foreach($question as $key => $q)
    <div class="col-12">
        <div class="card">
            <div class="header bg-cyan">
                <div class="row">
                    <h2 class="col-1">{{ $sn++ }}</h2>
                    <h2 class="col-10">{{ $q->question }}</h2>
                </div>
                <ul class="header-dropdown" style="top: 16px;">
                    <li>
                        <a href="">
                            <i class="material-icons">remove_red_eye</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="form-check form-check-radio row">
                    <label class="col-12">
                        <div class="row">
                            <span class="col-1">A</span>
                            <input name="group1" type="radio" />
                            <span class="col-10">{{ $q->option_1 }}</span>
                        </div>
                    </label>

                    <label class="col-12">
                        <div class="row">
                            <span class="col-1">B</span>
                            <input name="group1" type="radio" />
                            <span class="col-10">{{ $q->option_2 }}</span>
                        </div>
                    </label>
                    <label class="col-12">
                        <div class="row">
                            <span class="col-1">C</span>
                            <input name="group1" type="radio" />
                            <span class="col-10">{{ $q->option_3 }}</span>
                        </div>
                    </label>
                    @if($q->option_4)
                    <label class="col-12">
                        <div class="row">
                            <span class="col-1">D</span>
                            <input name="group1" type="radio" />
                            <span class="col-10">{{ $q->option_4 }}</span>
                        </div>
                    </label>
                    @endif
                    @if($q->option_5)
                    <label class="col-12">
                        <div class="row">
                            <span class="col-1">E</span>
                            <input name="group1" type="radio" />
                            <span class="col-10">{{ $q->option_5 }}</span>
                        </div>
                    </label>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    No records found.
    @endif
</div>