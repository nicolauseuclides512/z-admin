<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('app/be/materialize/css/materialize.min.css')); ?>" media="screen,projection"/>
<!-- Bootstrap Styles-->
<link href="<?php echo e(asset('app/be/css/bootstrap.css')); ?>" rel="stylesheet"/>
<!-- FontAwesome Styles-->
<link href="<?php echo e(asset('app/be/css/font-awesome.css')); ?>" rel="stylesheet"/>
<!-- Morris Chart Styles-->
<link href="<?php echo e(asset('app/be/js/morris/morris-0.4.3.min.css')); ?>" rel="stylesheet"/>
<!-- Custom Styles-->
<link href="<?php echo e(asset('app/be/css/custom-styles.css')); ?>" rel="stylesheet"/>
<!-- Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="<?php echo e(asset('app/be/js/Lightweight-Chart/cssCharts.css')); ?>">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style>
    [v-cloak] {
        display: none;
    }

    .card .card-action a:not(.btn):not(.btn-large):not(.btn-floating) {
        color: #00b0ff;
    }

    .card .card-action a:not(.btn):not(.btn-large):not(.btn-floating):hover {
        color: #00b0ff;
    }

    /*replace material js*/
    .btn, .btn-large {
        letter-spacing: 0;
    }

    .btn, .btn-large, .btn-flat {
        text-transform: capitalize;
    }

    .form-group {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .form-control-placeholder {
        position: absolute;
        top: 0;
        padding: 7px 0 0 13px;
        transition: all 200ms;
        opacity: 0.5;
    }

    .form-control:focus + .form-control-placeholder,
    .form-control:valid + .form-control-placeholder {
        margin-top: 10px;
        font-size: 75%;
        transform: translate3d(0, -100%, 0);
        opacity: 1;
    }

    /*toggle switch button*/
    .switch {
        --uiSwitchSize: var(--switchSize, 64px);
        --uiSwitchBgColor: var(--switchBgColor, #f1f1f1);
        --uiSwitchBgColorActive: var(--switchBgColorActive, #2bbbad);
        --uiSwitchBorderColorActive: var(--switchBorderColorActive, #fff);
        --uiSwitchBorderColorFocus: var(--switchBgColorFocus, #2bbbad);
        --uiSwitchButtonBgColor: var(--switchButtonBgColor, #fff);

        display: inline-block;
        position: relative;
        cursor: pointer;
        -webkit-tap-highlight-color: transparent;
    }

    .switch__label {
        display: block;
        width: 100%;
        height: 100%;
    }

    .switch__toggle {
        width: 0;
        height: 0;
        opacity: 0;

        position: absolute;
        top: 0;
        left: 0;
    }

    .switch__toggle:focus ~ .switch__label {
        box-shadow: 0 0 0 var(--uiSwitchThickFocus, 4px) var(--uiSwitchBorderColorFocus);
    }

    .switch__toggle:checked:focus ~ .switch__label {
        box-shadow: 0 0 0 var(--uiSwitchThickFocus, 4px) var(--uiSwitchBorderColorActive);
    }

    .switch__label:before, .switch__label:after {
        content: "";
        cursor: pointer;

        position: absolute;
        top: 0;
        left: 0;
    }

    .switch__label:before {
        width: 100%;
        height: 100%;
        box-sizing: border-box;
        background-color: var(--uiSwitchBgColor);
    }

    .switch__label:after {
        top: 50%;
        z-index: 3;
        transition: transform .4s cubic-bezier(0.44, -0.12, 0.07, 1.15);
    }

    /* type 1 */

    .switch_type1 {
        --uiSwitchBorderRadius: var(--switchBorderRadius, 60px);

        width: var(--uiSwitchSize);
        height: calc((var(--uiSwitchSize) / 2));
        border-radius: var(--uiSwitchBorderRadius);
        background-color: var(--uiSwitchBgColorActive);
    }

    .switch_type1 .switch__label {
        border-radius: var(--uiSwitchBorderRadius);
    }

    .switch_type1 .switch__label:before {
        border-radius: var(--uiSwitchBorderRadius);
        transition: opacity .2s ease-out .1s, transform .2s ease-out .1s;
        transform: scale(1);
        opacity: 1;
    }

    .switch_type1 .switch__toggle:checked ~ .switch__label:before {
        transform: scale(0);
        opacity: .7;
    }

    .switch_type1 .switch__label:after {
        width: calc(var(--uiSwitchSize) / 2);
        height: calc(var(--uiSwitchSize) / 2);
        transform: translate3d(0, -50%, 0);

        background-color: var(--uiSwitchButtonBgColor);
        border-radius: 100%;
        box-shadow: 0 2px 5px rgba(0, 0, 0, .3);
    }

    .switch_type1 .switch__toggle:checked ~ .switch__label:after {
        transform: translate3d(100%, -50%, 0);
    }

    /* type 2 */

    .switch_type2 {
        --uiSwitchIndent: var(--switchIndent, 8px);
        --uiSwitchBorderRadius: var(--switchBorderRadius, 60px);

        width: var(--uiSwitchSize);
        height: calc((var(--uiSwitchSize) / 2));
        border-radius: var(--uiSwitchBorderRadius);
        background-color: var(--uiSwitchBgColorActive);
    }

    .switch_type2 .switch__label {
        border-radius: var(--uiSwitchBorderRadius);
    }

    .switch_type2 .switch__label:before {
        border-radius: var(--uiSwitchBorderRadius);
        transition: opacity .2s ease-out .1s, transform .2s ease-out .1s;
        transform: scale(1);
        opacity: 1;
    }

    .switch_type2 .switch__toggle:checked ~ .switch__label:before {
        transform: scale(0);
        opacity: .7;
    }

    .switch_type2 .switch__toggle ~ .switch__label:after {
        width: calc((var(--uiSwitchSize) / 2) - calc(var(--uiSwitchIndent) * 2));
        height: calc((var(--uiSwitchSize) / 2) - calc(var(--uiSwitchIndent) * 2));
        transform: translate3d(var(--uiSwitchIndent), -50%, 0);

        background-color: var(--uiSwitchButtonBgColor);
        border-radius: 100%;
    }

    .switch_type2 .switch__toggle:checked ~ .switch__label:after {
        transform: translate3d(calc(var(--uiSwitchSize) - calc((var(--uiSwitchSize) / 2) - calc(var(--uiSwitchIndent) * 2)) - var(--uiSwitchIndent)), -50%, 0);
    }

    /* type 3 */

    .switch_type3 {
        --uiSwitchIndent: var(--switchIndent, 8px);

        width: var(--uiSwitchSize);
        height: calc((var(--uiSwitchSize) / 2));
        background-color: var(--uiSwitchBgColorActive);
    }

    .switch_type3 .switch__toggle:checked ~ .switch__label:before {
        background-color: var(--uiSwitchBgColorActive);
    }

    .switch_type3 .switch__label:after {
        width: calc((var(--uiSwitchSize) / 2) - calc(var(--uiSwitchIndent) * 2));
        height: calc((var(--uiSwitchSize) / 2) - calc(var(--uiSwitchIndent) * 2));
        transform: translate3d(var(--uiSwitchIndent), -50%, 0);
        background-color: var(--uiSwitchButtonBgColor);
    }

    .switch_type3 .switch__toggle:checked ~ .switch__label:after {
        transform: translate3d(calc(var(--uiSwitchSize) - calc((var(--uiSwitchSize) / 2) - calc(var(--uiSwitchIndent) * 2)) - var(--uiSwitchIndent)), -50%, 0);
    }

    /* demo styles for switch */

    .switch {
        --switchSize: 50px;
    }

    .switch_type2 {
        --switchBgColorActive: #e85c3f;
        --switchBgColorFocus: #d54b2e;
    }

    /*Choose Image File*/
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    #img-upload{
        width: 50%;
    }

    .most-access{
        padding-bottom: 50px;
    }

    #cancel-btn{
        background-color: #fff;
        color: #333;
        border-color: #ccc;
    }

    #dt_carriers_paginate a{
        padding: 5px;
    }

</style>
<?php echo $__env->yieldPushContent('css'); ?>
