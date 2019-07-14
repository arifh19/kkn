@extends('layouts.app')

@section('dashboard')
    Dashboard
    <small>Admin</small>
@endsection

@section('breadcrumb')
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
@endsection

@section('content')
    <!-- Welcome -->
    <div class="row">
        <div class="col-md-12">
            <div class="callout callout-success">
              <h4>Selamat Datang</h4>

              <p>Sistem Informasi Manajemen Proker</p>

            </div>
        </div>
    </div>

    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><strong>Pokok Tema</strong></span>
            <span class="info-box-number">{{$sum_pt}} Jam</span>

              <div class="progress">
                <div class="progress-bar" style="width: {{$pres_pt}}%"></div>
              </div>
              <span class="progress-description">
                    Pencapaian {{$pres_pt}} %
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><strong>Pokok Non Tema</strong></span>
            <span class="info-box-number">{{$sum_pn}} Jam</span>

              <div class="progress">
                <div class="progress-bar" style="width: {{$pres_pn}}%"></div>
              </div>
              <span class="progress-description">
                    Pencapaian {{$pres_pn}} %
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><strong>Bantu Tema</strong></span>
            <span class="info-box-number">{{$sum_bt}} Jam</span>

              <div class="progress">
                <div class="progress-bar" style="width: {{$pres_bt}}%"></div>
              </div>
              <span class="progress-description">
                    Pencapaian {{$pres_bt}} %
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><strong>Bantu Non Tema</strong></span>
            <span class="info-box-number">{{$sum_bn}} Jam</span>

              <div class="progress">
                <div class="progress-bar" style="width: {{$pres_bn}}%"></div>
              </div>
              <span class="progress-description">
                    Pencapaian {{$pres_bn}} %
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

    </div>
    <!-- /.row -->

@endsection
