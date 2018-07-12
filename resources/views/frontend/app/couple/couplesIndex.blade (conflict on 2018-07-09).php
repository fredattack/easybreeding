@extends('frontend.layouts.customApp')

@section('title', app_name() . ' | '.__('navs.frontend.couples'))

@section('content')


    <div class="row page-titles">
        {{--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/datatables.min.js"></script>--}}
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{__('navs.frontend.couples')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{route('frontend.app.dashboard')}}">{{__('navs.frontend.dashboard')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route('frontend.app.couples')}}">{{__('navs.frontend.couples')}}</a></li>



            </ol>
        </div>
        <div>
            {{--<button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>--}}
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        @if (session('info'))
            <div class="alert alert-success">
                {{ session('info') }}
            </div>
        @endif
        @include('frontend.app.modales.bird')
        @include('frontend.app.modales.specieModale')

        <div class="row">
            <div class="col-12" id="element">
                <div class="card">
                    <div class="card-body">


                        <!--region ToolBar-->
                        <div class="row">
                            <div class="col-12" id="toolBar">

                                <div class="row">
                                    <div class="col-md-3">
                                       <div class="row">
                                               <button type="button" class="btn btn-circle btn-xl btn-default" data-toggle="tooltip" title="{{__('alerts.frontend.displayList')}}" data-placement="bottom" id="btnList">
                                                    <i class="fa fa-th-list"></i>
                                               </button>

                                               <button type="button" class="btn btn-circle btn-xl btn-default" data-toggle="tooltip" title="{{__('alerts.frontend.displayBlock')}}" data-placement="bottom" id="btnBlock">
                                                    <i class="fa  fa-th-large"></i>
                                               </button>

                                       </div>
                                    </div>
                                <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">
                                        <a href="{{ route('frontend.app.birdCreate') }}" class="btn btn-circle btn-lg btn-success pull-right" data-toggle="tooltip" title="{{__('alerts.frontend.addBird')}}" data-placement="bottom">
                                            <i class="fa fa-plus"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--endregion-->

                        <!-- Content -->


                    </div>

                </div>

                <div class="card">
                    <div class="card-body">
                            {{--<div class="col-md-12" style="border: 1px solid red">--}}
                        <div class="row" >
                            <div class="col-md-12 text-center" id="element" >
                              <div id="demo">

      <table class="footable table toggle-circle  demo " data-show-toggle="true" data-filter="#filter" data-filter-text-only="false"
             data-page-size="10" data-page-navigation=".pagination" data-sorting="true" data-filtering="true" data-paging="true">

        <thead>
          <tr>
            <th data-toggle="true" >
              First Name
            </th>
            <th>
              Last Name
            </th>
            <th data-hide="phone,tablet" title="job">
              Job Title
            </th>
            <th data-hide="phone,tablet" title="Dob">
              DOB
            </th>
            <th data-hide="phone" title="phone">
              Status
            </th>
          </tr>
        </thead>
        <tbody>
          <tr data-expanded="true">
              <td>test name</td>
              <td>test</td>
              <td>troisieme</td>
              <td>quatrieme</td>
              <td>cinquieme</td>
          </tr>
        </tbody>
        <tfoot class="hide-if-no-paging">
          <tr>
            <td colspan="5" class="text-center">
            <ul class="pagination"></ul>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
       @include('frontend.component.site.rightSideBar')
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    {{--<script src="{{asset('/js/jquery.dataTables.min.js')}}"></script>--}}
    {{--<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>--}}



@endsection

@section('script')
    <script type="text/javascript" src="{{mix('/js/appfrontendDatable.js')}}"></script>
    <script type="text/javascript">

</script>

@endsection


