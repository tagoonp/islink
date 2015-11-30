<div class="" style="padding: 0px; font-size: 1.3em;  color: #000;">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td>
        <div class="" style="font-size: 1.1em;  padding: 10px; ">
          <!-- <font color="#06c">IS-Link</font> map -->
        </div>
      </td>
      <td width="40" valign="top" align="center">
        <a href="#" class="link-a" id="hide-filter" style="font-size: 0.5em;"><i class="fa fa-times"></i></a>
      </td>
    </tr>
    <tr>
      <td colspan="2" >
        <div class="" style="padding: 10px; padding-top: 0px; font-size: 0.7em;">
          <span style="font-size: 1.3em; padding-left: 10px;">สถานที่</span>
          <div class="form-group">
            <div class="col-md-12">
              ระดับการจัดกลุ่ม :
              <select class="select2able" name="txtLevel" id="txtLevel" style="width: 100%; outline: none;">
                <option value="1" selected="">เขตบริการสุขภาพ</option>
                <option value="2">จังหวัด</option>
                <option value="3">อำเภอ</option>
                <option value="4" selected="">ตำบล</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              เลือกเขตบริการสุขภาพ :
              <select class="select2able" name="txtServicearea" id="txtServicearea" style="width: 100%; outline: none;">
                <option value="" selected="">-- ทุกเขตบริการสุขภาพ --</option>
                <?php
                $strSQL = "";
                $strSQL = "SELECT * FROM ".$tbPrefix."servicearea  WHERE sa_status = 'Yes' order by sa_name";
                $resultProvince = $db->select($strSQL,false,true);
                if($resultProvince){
                  foreach ($resultProvince as $value) {
                    ?><option value="<?php print $value['sa_id']; ?>"><?php print $value['sa_name']; ?></option><?php
                  }
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              เลือกจังหวัด :
              <select class="select2able" name="txtProvince" id="txtProvince" style="width: 100%; outline: none;">
                <option value="" selected="">-- ทุกจังหวัด --</option>
                <?php
                $strSQL = "SELECT * FROM ".$tbPrefix."changwat a inner join ".$tbPrefix."servicearea_detail b on a.Changwat = b.sad_changwat
                          inner join ".$tbPrefix."servicearea c on b.sad_sa_id = c.sa_id WHERE a.Changwat_status = 'Yes' and c.sa_status = 'Yes' order by a.Name";
                $resultProvince = $db->select($strSQL,false,true);
                if($resultProvince){
                  foreach ($resultProvince as $value) {
                    ?><option value="<?php print $value['Changwat']; ?>"><?php print $value['Name']; ?></option><?php
                  }
                }
                ?>
              </select>
            </div>
          </div>
          <span style=" padding-left: 10px;" class="ampurfilter">เลือกอำเภอ :</span>
          <div class="form-group ampurfilter" >
            <div class="col-md-12" >
              <select class="select2able" name="txtDistrict" id="txtDistrict" style="width: 100%;">
                <option value="" selected="">-- ทุกอำเภอ --</option>
                <?php
                $strSQL = "SELECT a.Name as apname, a.Ampur FROM ".$tbPrefix."ampur a inner join ".$tbPrefix."changwat b on a.Changwat = b.Changwat
                          inner join ".$tbPrefix."servicearea_detail c on b.Changwat = c.sad_changwat
                          inner join ".$tbPrefix."servicearea d on c.sad_sa_id = d.sa_id
                          WHERE b.Changwat_status = 'Yes' and d.sa_status = 'Yes' order by a.Name";
                $resultDistrict = $db->select($strSQL,false,true);
                if($resultDistrict){
                  foreach ($resultDistrict as $value) {
                    ?><option value="<?php print $value['Ampur']; ?>"><?php print $value['apname']; ?></option><?php
                  }
                }
                ?>>
              </select>
              <?php //print $strSQL; ?>
            </div>
          </div>
          <span style=" padding-left: 10px;" class="tambonfilter">เลือกตำบล :</span>
          <div class="form-group tambonfilter" >
            <div class="col-md-12" >
              <select class="select2able" name="txtTambon" id="txtTambon" style="width: 100%;">
                <option value="" selected="">-- ทุกตำบล --</option>
                <?php
                $strSQL = "SELECT a.Name as tbname, a.Tambon as tbid  FROM ".$tbPrefix."tumbon a inner join ".$tbPrefix."changwat b on a.Changwat = b.Changwat
                inner join ".$tbPrefix."servicearea_detail c on a.Changwat = c.sad_changwat
                inner join ".$tbPrefix."servicearea e on c.sad_sa_id = e.sa_id
                WHERE b.Changwat_status = 'Yes' and e.sa_status = 'Yes' order by a.Name";
                $resultDistrict = $db->select($strSQL,false,true);
                if($resultDistrict){
                  foreach ($resultDistrict as $value) {
                    ?><option value="<?php print $value['tbid']; ?>"><?php print $value['tbname']; ?></option><?php
                  }
                }
                ?>>
              </select>
            </div>
          </div>
          <span style="font-size: 1.3em; padding-left: 10px;">ช่วงเวลา</span><br>
          <span style=" padding-left: 10px;">ตั้งแต่วันที่ :</span>
          <div class="col-md-12">
              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd/mm/yyyy">
                <input class="form-control" type="text" name="txtStartdate" id="txtStartdate" ><span class="input-group-addon"><i class="fa fa-calendar"></i></span></input>
              </div>
          </div>
          <span style=" padding-left: 10px;">ถึงวันที่ :</span>
          <div class="col-md-12">
            <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd/mm/yyyy">
              <input class="form-control" type="text" name="txtEnddate" id="txtEnddate" ><span class="input-group-addon"><i class="fa fa-calendar"></i></span></input>
            </div>
          </div>
          <span style="font-size: 1.3em; padding-left: 10px;">ฐานข้อมูล</span>
          <div class="form-group" style="padding-left: 10px; padding-top: 10px;">
              <div class="col-md-12">
                <label class="checkbox"><input type="checkbox" checked><span>IS</span></label>
                <label class="checkbox"><input type="checkbox" checked><span>ITEMS</span></label>
                <label class="checkbox"><input type="checkbox"  disabled><span style="color: #888;">ECLAIM</span></label>
              </div>
          </div>
          <span style="font-size: 1.3em; padding-left: 10px;">ประเภทเหตุการณ์ฯ</span>
          <div class="form-group" style="padding-left: 10px; padding-top: 10px;">
              <div class="col-md-12">
                <label class="checkbox"><input type="checkbox" checked><span>อุบัติเหตุทางถนน/จราจร</span></label>
                <label class="checkbox"><input type="checkbox" checked><span>จมน้ำ/บาดเจ็บทางน้ำ</span></label>
                <label class="checkbox"><input type="checkbox" checked><span>อุบัติเหตุพลัดหกล้ม</span></label>
              </div>
          </div>
          <!-- <span style="font-size: 1.3em; padding-left: 10px;">ช่วงอายุ</span> -->
          <div class="slider-container" style="padding-left: 10px; padding-right: 10px;">
            <p style="padding-bottom: 10px;">
                        <span style="font-size: 1.3em;">ช่วงอายุ</span>
                          <span class="slider-range-amount pull-right"></span>
                      </p>
                      <div class="slider-range"></div>
                    </div>
          <br>
          <button class="btn btn-lg btn-block btn-danger" id="btnDisplay"><i class="fa fa-search"></i> แสดงผล</button>
        </div>

      </td>
    </tr>
  </table>
</div>
