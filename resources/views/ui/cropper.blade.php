@extends('layouts.layout-2')

@section('styles')
    <link rel="stylesheet" href="{{ mix('/vendor/libs/cropper/cropper.css') }}">
    
    <style>
        .cropper-example-container,
        .cropper-example-preview {
            background-color: #f7f7f7;
            width: 100%;
            text-align: center;
        }
    
        /* Container */
    
        .cropper-example-container {
            min-height: 200px;
            max-height: 400px;
            margin-bottom: 1rem;
            overflow: hidden;
        }
    
        .cropper-example-container>img {
            max-width: 100%;
        }
    
        @media (min-width: 768px) {
            .cropper-example-container {
                min-height: 400px;
            }
        }
    
        /* Preview */
    
        .cropper-example-preview {
            float: left;
            margin-right: .5rem;
            margin-bottom: .5rem;
            overflow: hidden;
            max-width: 100% !important;
        }
    
        [dir=rtl] .cropper-example-preview {
            direction: ltr;
            float: right;
            margin-right: 0;
            margin-left: .5rem;
        }
    
        .cropper-example-preview>img {
            max-width: 100%;
        }
    
        .cropper-example-preview.lg {
            width: 16rem;
            height: 9rem;
        }
    
        .cropper-example-preview.md {
            width: 8rem;
            height: 4.5rem;
        }
    
        .cropper-example-preview.sm {
            width: 4rem;
            height: 2.25rem;
        }
    
        .cropper-example-preview.xs {
            width: 2rem;
            height: 1.125rem;
            margin-right: 0;
        }
    
        [dir=rtl] .cropper-example-preview.xs {
            margin-left: 0;
        }
    
        /* Modal */
    
        .cropper-example-cropped .modal-body {
            text-align: center;
        }
    
        .cropper-example-cropped .modal-body>img,
        .cropper-example-cropped .modal-body>canvas {
            max-width: 100%;
        }
    
        .cropper-example-cropped .close {
            position: absolute;
            right: 20px;
            top: 20px;
        }
    </style>
@endsection

@section('scripts')
    <!-- Dependencies -->
    <script src="{{ mix('/vendor/libs/cropper/cropper.js') }}"></script>
    
    <script src="{{ mix('/js/ui_cropper.js') }}"></script>
@endsection

@section('content')
    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">UI elements /</span> Cropper.js
    </h4>

    <hr class="border-light container-m--x mt-0 mb-4">

    <div class="row">
        <div class="col-md-9">

            <div class="cropper-example-container">
                <img id="cropper-example-image" src="/img/bg/1.jpg" alt="Picture">
            </div>

        </div>
        <div class="col-md-3">

            <!-- Preview -->
            <div class="mb-3 clearfix">
                <div class="cropper-example-preview lg"></div>
                <div class="cropper-example-preview md"></div>
                <div class="cropper-example-preview sm"></div>
                <div class="cropper-example-preview xs"></div>
            </div>

            <!-- Data -->
            <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text">X</span>
                </div>
                <input type="text" class="form-control" id="cropper-example-dataX" placeholder="x" readonly>
                <div class="input-group-append">
                    <span class="input-group-text">px</span>
                </div>
            </div>
            <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text">Y</span>
                </div>
                <input type="text" class="form-control" id="cropper-example-dataY" placeholder="y" readonly>
                <div class="input-group-append">
                    <span class="input-group-text">px</span>
                </div>
            </div>
            <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text">Width</span>
                </div>
                <input type="text" class="form-control" id="cropper-example-dataWidth" placeholder="width" readonly>
                <div class="input-group-append">
                    <span class="input-group-text">px</span>
                </div>
            </div>
            <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text">Height</span>
                </div>
                <input type="text" class="form-control" id="cropper-example-dataHeight" placeholder="height" readonly>
                <div class="input-group-append">
                    <span class="input-group-text">px</span>
                </div>
            </div>
            <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rotate</span>
                </div>
                <input type="text" class="form-control" id="cropper-example-dataRotate" placeholder="rotate" readonly>
                <div class="input-group-append">
                    <span class="input-group-text">deg</span>
                </div>
            </div>
            <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text">ScaleX</span>
                </div>
                <input type="text" class="form-control" id="cropper-example-dataScaleX" placeholder="scaleX" readonly>
            </div>
            <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text">ScaleY</span>
                </div>
                <input type="text" class="form-control" id="cropper-example-dataScaleY" placeholder="scaleY" readonly>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="cropper-example-buttons col-md-9">

            <div class="btn-group mb-1">
                <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" data-toggle="cropper-example-tooltip" title="$().cropper(&quot;zoom&quot;,&nbsp;0.1)">
                    <span class="ion ion-md-add"></span>
                </button>
                <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" data-toggle="cropper-example-tooltip" title="$().cropper(&quot;zoom&quot;,&nbsp;-0.1)">
                    <span class="ion ion-md-remove"></span>
                </button>
            </div>

            <div class="btn-group mb-1">
                <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" data-toggle="cropper-example-tooltip" title="$().cropper(&quot;move&quot;,&nbsp;-10,&nbsp;0)">
                    <span class="ion ion-md-arrow-back"></span>
                </button>
                <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" data-toggle="cropper-example-tooltip" title="$().cropper(&quot;move&quot;,&nbsp;10,&nbsp;0)">
                    <span class="ion ion-md-arrow-forward"></span>
                </button>
                <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" data-toggle="cropper-example-tooltip" title="$().cropper(&quot;move&quot;,&nbsp;0,&nbsp;-10)">
                    <span class="ion ion-md-arrow-up"></span>
                </button>
                <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" data-toggle="cropper-example-tooltip" title="$().cropper(&quot;move&quot;,&nbsp;0,&nbsp;10)">
                    <span class="ion ion-md-arrow-down"></span>
                </button>
            </div>

            <div class="btn-group mb-1">
                <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" data-toggle="cropper-example-tooltip" title="$().cropper(&quot;rotate&quot;,&nbsp;-45)">
                        <span class="ion ion-md-refresh"></span>
                </button>
                <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" data-toggle="cropper-example-tooltip" title="$().cropper(&quot;rotate&quot;,&nbsp;45)">
                    <span class="ion ion-md-refresh scaleX--1"></span>
                </button>
            </div>

            <div class="btn-group mb-1">
                <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" data-toggle="cropper-example-tooltip" title="$().cropper(&quot;scaleX&quot;,&nbsp;-1)">
                    <span class="ion ion-md-swap"></span>
                </button>
                <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" data-toggle="cropper-example-tooltip" title="$().cropper(&quot;scaleY&quot;,&nbsp;-1)">
                    <span class="ion ion-md-swap rotate--90"></span>
                </button>
            </div>

            <div class="btn-group mb-1">
                <button type="button" class="btn btn-primary" data-method="reset" data-toggle="cropper-example-tooltip" title="$().cropper(&quot;reset&quot;)">
                    <span class="ion ion-md-sync"></span>
                </button>
                <label class="btn btn-primary btn-upload" data-toggle="cropper-example-tooltip" title="Upload image file">
                    <input type="file" class="sr-only" id="cropper-example-inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                    <span class="ion ion-md-cloud-upload"></span>
                </label>
            </div>

            <div class="btn-group mb-1">
                <button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-toggle="cropper-example-tooltip" title="$().cropper(&quot;getCroppedCanvas&quot;)">
                    Get Cropped Canvas
                </button>
                <button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 160, &quot;height&quot;: 90 }" data-toggle="cropper-example-tooltip" title="$().cropper(&quot;getCroppedCanvas&quot;, {width:&nbsp;160,&nbsp;height:&nbsp;90})">
                    160&times;90
                </button>
                <button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 320, &quot;height&quot;: 180 }" data-toggle="cropper-example-tooltip" title="$().cropper(&quot;getCroppedCanvas&quot;, {width:&nbsp;320,&nbsp;height:&nbsp;180})">
                    320&times;180
                </button>
            </div>

        </div>
    </div>

    <!-- Show the cropped image in modal -->
    <div class="modal fade cropper-example-cropped" id="cropper-example-getCroppedCanvasModal" aria-hidden="true" aria-labelledby="cropper-example-getCroppedCanvasTitle" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cropper-example-getCroppedCanvasTitle">Cropped</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body ie-mh-1"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a class="btn btn-primary" id="cropper-example-download" href="#;" download="cropped.jpg">Download</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->
@endsection