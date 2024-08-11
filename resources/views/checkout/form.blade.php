<h3 class="text-danger">นับจากวันที่ทำการแจ้งย้ายออกมีเวลา 30 วันในการดำเนิดการ</h3>

<div class="form-group {{ $errors->has('Datetoday') ? 'has-error' : ''}} ">
    <label for="Datetoday" class="control-label">{{ 'วันที่แจ้งย้ายออก' }}</label>
    <?php
    $sevenDaysLater = \Carbon\Carbon::now('Asia/Bangkok');
    $formattedDate = $sevenDaysLater->locale('th_TH')->isoFormat('YYYY-MM-DD HH:mm:ss');
    ?>
    <input class="form-control" name="Datetoday" type="datetime-local" id="Datetoday"
        value="{{ $formattedDate }}" readonly>{!! $errors->first('Datetoday', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('DateCheckout') ? 'has-error' : ''}} ">
    <label for="DateCheckout" class="control-label">{{ 'วันที่ย้ายออก' }}</label>
    <?php
    $sevenDaysLater = \Carbon\Carbon::now('Asia/Bangkok')->addDays(30);
    $formattedDate = $sevenDaysLater->locale('th_TH')->isoFormat('YYYY-MM-DD HH:mm:ss');
    ?>
    <input class="form-control" name="DateCheckout" type="datetime-local" id="DateCheckout" value="{{ $formattedDate }}" readonly>
    {!! $errors->first('DateCheckout', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('LeaseID') ? 'has-error' : ''}}">
    <label for="LeaseID" class="control-label">{{ 'เลขที่สัญญา' }}</label>
    <input class="form-control" name="LeaseID" type="text" id="LeaseID" value="{{ isset($lease->id) ? $lease->id : ''}}" readonly>
    {!! $errors->first('LeaseID', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('Usersid') ? 'has-error' : ''}}">
    <label for="Usersid" class="control-label">{{ 'รหัสผู้เช่า' }}</label>
    <input class="form-control" name="Usersid" type="text" id="Usersid" value="{{ isset($checkout->Usersid) ? $checkout->Usersid : auth()->user()->id }}" readonly>
    {!! $errors->first('Usersid', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
</div>

