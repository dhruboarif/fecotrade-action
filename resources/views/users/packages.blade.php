@extends('layouts.main') 
@section('title', 'Pricing')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-dollar-sign bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Gala Investment Packages')}}</h5>
                            <span>Available Amount: {{$data['cash_wallet'] ? 'Gala '.number_format((float)$data['cash_wallet'], 2, '.', '') : 'Gala 00.00'}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href=""><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Pricing')}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        
        <section class="pricing">
          <div class="container">
            <div class="row">
              @foreach($packages as $row)
              <div class="col-lg-4">
                <div class="card mb-5 mb-lg-0">
                  <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">{{$row->package_name}}</h5>
                    <h6 class="card-price text-center"><i class="fa fa-money" aria-hidden="true"></i>{{$row->price}}<span class="period">/gala</span></h6>
                    <hr>
                   
                   
                          <div class="input-group mb-3">
                          <span class="input-group-text text-right"  id="basic-addon1" style="color:#080808;width: 70%; font-weight:100%;">Price (Gala)</span>
                          <input  type="text" class="form-control" value="{{$row->price}}" >
                            </div>
                            <div class="input-group mb-3">
                            <span class="input-group-text text-right" style="color:#080808; width: 70%; font-weight:100%;" id="basic-addon1">Total ROI</span>
                            <input type="text" class="form-control" value="{{$row->total_roi}}" >
                              </div>
                              <div class="input-group mb-3">
                              <span class="input-group-text text-right" style="color:#080808; width: 70%; font-weight:100%;" id="basic-addon1">Daily ROI</span>
                              <input type="text" class="form-control" value="{{$row->daily_roi}}" >
                                </div>
                                <div class="input-group mb-3">
                                <span class="input-group-text text-right" style="color:#080808; width: 70%; font-weight:100%;" id="basic-addon1">
                                                                                    Validity (days)</span>
                                <input  type="text" class="form-control" value="{{$row->validity}}" >
                                  </div>
                                  <div class="input-group mb-3">
                                <span class="input-group-text text-right" style="color:#080808; width: 70%; font-weight:100%;" id="basic-addon1">
                                                                                    No of Level Bonus</span>
                                <input  type="text" class="form-control" value="{{$row->no_of_levels}}" >
                                  </div>
                                  <div class="text-center">
                                    
                                         
                                    <a href="#" class="btn btn-block btn-primary text-uppercase" data-toggle="modal" data-target="#packagebuymodal{{$row->id}}" >Buy Package</a>
                                         @include('users.modals.packagebuymodal')
                                      </form>
                                  </div>

                    
                  </div>
                </div>
              </div>
              <!-- Plus Tier -->

              @endforeach
            </div>
          </div>
        </section>
 
    </div>
@endsection
