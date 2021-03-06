<!-- BEGIN MAIN CONTENT -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue" id="form_wizard_1">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-direction"></i> 模块编辑 - <span class="step-title">
								Step 1 of 4 </span>
                </div>
                <div class="tools hidden-xs">
                    <a href="javascript:;" class="collapse">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <form action="/dcmodel/data" class="form-horizontal" id="submit_form" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-wizard">
                        <div class="form-body">
                            <ul class="nav nav-pills nav-justified steps">
                                <li>
                                    <a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> 基本信息 </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2 </span>
												<span class="desc">
												<i class="fa fa-check"></i> 选择图标 </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab" class="step active">
												<span class="number">
												3 </span>
												<span class="desc">
												<i class="fa fa-check"></i> 选择组件 </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab4" data-toggle="tab" class="step">
												<span class="number">
												4 </span>
												<span class="desc">
												<i class="fa fa-check"></i> 确认信息 </span>
                                    </a>
                                </li>
                            </ul>
                            <div id="bar" class="progress progress-striped" role="progressbar">
                                <div class="progress-bar progress-bar-success">
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="alert alert-danger display-none">
                                    <button class="close" data-dismiss="alert"></button>
                                    你某项输入有误，请检查后重新弄输入.
                                </div>
                                <div class="alert alert-success display-none">
                                    <button class="close" data-dismiss="alert"></button>
                                    Your form validation is successful!
                                </div>
                                <div class="tab-pane active" id="tab1">
                                    <h3 class="block">模块基本设置</h3>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">模块ID <span class="required">
													* </span>
                                        </label>

                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="name"/>
														<span class="help-block">
														请输入模块ID </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">模块标题 <span class="required">
													* </span>
                                        </label>

                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="title"/>
														<span class="help-block">
														请输入模块标题 </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">菜单类型 <span class="required">
													* </span>
                                        </label>
                                        <div class="col-md-4">
                                            <select name="ismenu" class="form-control">
                                                <option value="1"> 显示 </option>
                                                <option value="0"> 隐藏 </option>
                                            </select>
														<span class="help-block">
                                                        请选择菜单类型 </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> 模 板
                                        </label>

                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="template"/>
														<span class="help-block">
														请输入模板 </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <h3 class="block">选择模块图标</h3>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">模块图标 <span class="required">
													* </span>
                                        </label>

                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="icon"/>
														<span class="help-block">
														请输入模块图标 </span>
                                        </div>
                                    </div>
                                    <div class="simplelineicons-demo">
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-user';"><span class="item"><span aria-hidden="true" class="icon-user"></span>&nbsp;icon-user </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-user-female';"><span class="item"><span aria-hidden="true" class="icon-user-female"></span>&nbsp;icon-user-female </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-users';"><span class="item"><span aria-hidden="true" class="icon-users"></span>&nbsp;icon-users </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-user-follow';"><span class="item"><span aria-hidden="true" class="icon-user-follow"></span>&nbsp;icon-user-follow </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-user-following';"><span class="item"><span aria-hidden="true" class="icon-user-following"></span>&nbsp;icon-user-following </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-user-unfollow';"><span class="item"><span aria-hidden="true" class="icon-user-unfollow"></span>&nbsp;icon-user-unfollow </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-trophy';"><span class="item"><span aria-hidden="true" class="icon-trophy"></span>&nbsp;icon-trophy </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-speedometer';"><span class="item"><span aria-hidden="true" class="icon-speedometer"></span>&nbsp;icon-speedometer </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-social-youtube';"><span class="item"><span aria-hidden="true" class="icon-social-youtube"></span>&nbsp;icon-social-youtube </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-social-twitter';"><span class="item"><span aria-hidden="true" class="icon-social-twitter"></span>&nbsp;icon-social-twitter </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-social-tumblr';"><span class="item"><span aria-hidden="true" class="icon-social-tumblr"></span>&nbsp;icon-social-tumblr </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-social-facebook';"><span class="item"><span aria-hidden="true" class="icon-social-facebook"></span>&nbsp;icon-social-facebook </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-social-dropbox';"><span class="item"><span aria-hidden="true" class="icon-social-dropbox"></span>&nbsp;icon-social-dropbox </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-social-dribbble';"><span class="item"><span aria-hidden="true" class="icon-social-dribbble"></span>&nbsp;icon-social-dribbble </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-shield';"><span class="item"><span aria-hidden="true" class="icon-shield"></span>&nbsp;icon-shield </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-screen-tablet';"><span class="item"><span aria-hidden="true" class="icon-screen-tablet"></span>&nbsp;icon-screen-tablet </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-screen-smartphone';"><span class="item"><span aria-hidden="true" class="icon-screen-smartphone"></span>&nbsp;icon-screen-smartphone </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-screen-desktop';"><span class="item"><span aria-hidden="true" class="icon-screen-desktop"></span>&nbsp;icon-screen-desktop </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-plane';"><span class="item"><span aria-hidden="true" class="icon-plane"></span>&nbsp;icon-plane </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-notebook';"><span class="item"><span aria-hidden="true" class="icon-notebook"></span>&nbsp;icon-notebook </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-moustache';"><span class="item"><span aria-hidden="true" class="icon-moustache"></span>&nbsp;icon-moustache </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-mouse';"><span class="item"><span aria-hidden="true" class="icon-mouse"></span>&nbsp;icon-mouse </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-magnet';"><span class="item"><span aria-hidden="true" class="icon-magnet"></span>&nbsp;icon-magnet </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-magic-wand';"><span class="item"><span aria-hidden="true" class="icon-magic-wand"></span>&nbsp;icon-magic-wand </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-hourglass';"><span class="item"><span aria-hidden="true" class="icon-hourglass"></span>&nbsp;icon-hourglass </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-graduation';"><span class="item"><span aria-hidden="true" class="icon-graduation"></span>&nbsp;icon-graduation </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-ghost';"><span class="item"><span aria-hidden="true" class="icon-ghost"></span>&nbsp;icon-ghost </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-game-controller';"><span class="item"><span aria-hidden="true" class="icon-game-controller"></span>&nbsp;icon-game-controller </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-fire';"><span class="item"><span aria-hidden="true" class="icon-fire"></span>&nbsp;icon-fire </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-eyeglasses';"><span class="item"><span aria-hidden="true" class="icon-eyeglasses"></span>&nbsp;icon-eyeglasses </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-envelope-open';"><span class="item"><span aria-hidden="true" class="icon-envelope-open"></span>&nbsp;icon-envelope-open </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-envelope-letter';"><span class="item"><span aria-hidden="true" class="icon-envelope-letter"></span>&nbsp;icon-envelope-letter </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-energy';"><span class="item"><span aria-hidden="true" class="icon-energy"></span>&nbsp;icon-energy </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-emoticon-smile';"><span class="item"><span aria-hidden="true" class="icon-emoticon-smile"></span>&nbsp;icon-emoticon-smile </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-disc';"><span class="item"><span aria-hidden="true" class="icon-disc"></span>&nbsp;icon-disc </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-cursor-move';"><span class="item"><span aria-hidden="true" class="icon-cursor-move"></span>&nbsp;icon-cursor-move </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-crop';"><span class="item"><span aria-hidden="true" class="icon-crop"></span>&nbsp;icon-crop </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-credit-card';"><span class="item"><span aria-hidden="true" class="icon-credit-card"></span>&nbsp;icon-credit-card </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-chemistry';"><span class="item"><span aria-hidden="true" class="icon-chemistry"></span>&nbsp;icon-chemistry </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-bell';"><span class="item"><span aria-hidden="true" class="icon-bell"></span>&nbsp;icon-bell </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-badge';"><span class="item"><span aria-hidden="true" class="icon-badge"></span>&nbsp;icon-badge </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-anchor';"><span class="item"><span aria-hidden="true" class="icon-anchor"></span>&nbsp;icon-anchor </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-action-redo';"><span class="item"><span aria-hidden="true" class="icon-action-redo"></span>&nbsp;icon-action-redo </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-action-undo';"><span class="item"><span aria-hidden="true" class="icon-action-undo"></span>&nbsp;icon-action-undo </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-bag';"><span class="item"><span aria-hidden="true" class="icon-bag"></span>&nbsp;icon-bag </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-basket';"><span class="item"><span aria-hidden="true" class="icon-basket"></span>&nbsp;icon-basket </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-basket-loaded';"><span class="item"><span aria-hidden="true" class="icon-basket-loaded"></span>&nbsp;icon-basket-loaded </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-book-open';"><span class="item"><span aria-hidden="true" class="icon-book-open"></span>&nbsp;icon-book-open </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-briefcase';"><span class="item"><span aria-hidden="true" class="icon-briefcase"></span>&nbsp;icon-briefcase </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-bubbles';"><span class="item"><span aria-hidden="true" class="icon-bubbles"></span>&nbsp;icon-bubbles </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-calculator';"><span class="item"><span aria-hidden="true" class="icon-calculator"></span>&nbsp;icon-calculator </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-call-end';"><span class="item"><span aria-hidden="true" class="icon-call-end"></span>&nbsp;icon-call-end </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-call-in';"><span class="item"><span aria-hidden="true" class="icon-call-in"></span>&nbsp;icon-call-in </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-call-out';"><span class="item"><span aria-hidden="true" class="icon-call-out"></span>&nbsp;icon-call-out </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-compass';"><span class="item"><span aria-hidden="true" class="icon-compass"></span>&nbsp;icon-compass </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-cup';"><span class="item"><span aria-hidden="true" class="icon-cup"></span>&nbsp;icon-cup </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-diamond';"><span class="item"><span aria-hidden="true" class="icon-diamond"></span>&nbsp;icon-diamond </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-direction';"><span class="item"><span aria-hidden="true" class="icon-direction"></span>&nbsp;icon-direction </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-directions';"><span class="item"><span aria-hidden="true" class="icon-directions"></span>&nbsp;icon-directions </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-docs';"><span class="item"><span aria-hidden="true" class="icon-docs"></span>&nbsp;icon-docs </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-drawer';"><span class="item"><span aria-hidden="true" class="icon-drawer"></span>&nbsp;icon-drawer </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-drop';"><span class="item"><span aria-hidden="true" class="icon-drop"></span>&nbsp;icon-drop </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-earphones';"><span class="item"><span aria-hidden="true" class="icon-earphones"></span>&nbsp;icon-earphones </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-earphones-alt';"><span class="item"><span aria-hidden="true" class="icon-earphones-alt"></span>&nbsp;icon-earphones-alt </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-feed';"><span class="item"><span aria-hidden="true" class="icon-feed"></span>&nbsp;icon-feed </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-film';"><span class="item"><span aria-hidden="true" class="icon-film"></span>&nbsp;icon-film </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-folder-alt';"><span class="item"><span aria-hidden="true" class="icon-folder-alt"></span>&nbsp;icon-folder-alt </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-frame';"><span class="item"><span aria-hidden="true" class="icon-frame"></span>&nbsp;icon-frame </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-globe';"><span class="item"><span aria-hidden="true" class="icon-globe"></span>&nbsp;icon-globe </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-globe-alt';"><span class="item"><span aria-hidden="true" class="icon-globe-alt"></span>&nbsp;icon-globe-alt </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-handbag';"><span class="item"><span aria-hidden="true" class="icon-handbag"></span>&nbsp;icon-handbag </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-layers';"><span class="item"><span aria-hidden="true" class="icon-layers"></span>&nbsp;icon-layers </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-map';"><span class="item"><span aria-hidden="true" class="icon-map"></span>&nbsp;icon-map </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-picture';"><span class="item"><span aria-hidden="true" class="icon-picture"></span>&nbsp;icon-picture </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-pin';"><span class="item"><span aria-hidden="true" class="icon-pin"></span>&nbsp;icon-pin </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-playlist';"><span class="item"><span aria-hidden="true" class="icon-playlist"></span>&nbsp;icon-playlist </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-present';"><span class="item"><span aria-hidden="true" class="icon-present"></span>&nbsp;icon-present </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-printer';"><span class="item"><span aria-hidden="true" class="icon-printer"></span>&nbsp;icon-printer </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-puzzle';"><span class="item"><span aria-hidden="true" class="icon-puzzle"></span>&nbsp;icon-puzzle </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-speech';"><span class="item"><span aria-hidden="true" class="icon-speech"></span>&nbsp;icon-speech </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-vector';"><span class="item"><span aria-hidden="true" class="icon-vector"></span>&nbsp;icon-vector </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-wallet';"><span class="item"><span aria-hidden="true" class="icon-wallet"></span>&nbsp;icon-wallet </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-arrow-down';"><span class="item"><span aria-hidden="true" class="icon-arrow-down"></span>&nbsp;icon-arrow-down </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-arrow-left';"><span class="item"><span aria-hidden="true" class="icon-arrow-left"></span>&nbsp;icon-arrow-left </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-arrow-right';"><span class="item"><span aria-hidden="true" class="icon-arrow-right"></span>&nbsp;icon-arrow-right </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-arrow-up';"><span class="item"><span aria-hidden="true" class="icon-arrow-up"></span>&nbsp;icon-arrow-up </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-bar-chart';"><span class="item"><span aria-hidden="true" class="icon-bar-chart"></span>&nbsp;icon-bar-chart </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-bulb';"><span class="item"><span aria-hidden="true" class="icon-bulb"></span>&nbsp;icon-bulb </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-calendar';"><span class="item"><span aria-hidden="true" class="icon-calendar"></span>&nbsp;icon-calendar </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-control-end';"><span class="item"><span aria-hidden="true" class="icon-control-end"></span>&nbsp;icon-control-end </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-control-forward';"><span class="item"><span aria-hidden="true" class="icon-control-forward"></span>&nbsp;icon-control-forward </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-control-pause';"><span class="item"><span aria-hidden="true" class="icon-control-pause"></span>&nbsp;icon-control-pause </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-control-play';"><span class="item"><span aria-hidden="true" class="icon-control-play"></span>&nbsp;icon-control-play </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-control-rewind';"><span class="item"><span aria-hidden="true" class="icon-control-rewind"></span>&nbsp;icon-control-rewind </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-control-start';"><span class="item"><span aria-hidden="true" class="icon-control-start"></span>&nbsp;icon-control-start </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-cursor';"><span class="item"><span aria-hidden="true" class="icon-cursor"></span>&nbsp;icon-cursor </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-dislike';"><span class="item"><span aria-hidden="true" class="icon-dislike"></span>&nbsp;icon-dislike </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-equalizer';"><span class="item"><span aria-hidden="true" class="icon-equalizer"></span>&nbsp;icon-equalizer </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-graph';"><span class="item"><span aria-hidden="true" class="icon-graph"></span>&nbsp;icon-graph </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-grid';"><span class="item"><span aria-hidden="true" class="icon-grid"></span>&nbsp;icon-grid </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-home';"><span class="item"><span aria-hidden="true" class="icon-home"></span>&nbsp;icon-home </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-like';"><span class="item"><span aria-hidden="true" class="icon-like"></span>&nbsp;icon-like </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-list';"><span class="item"><span aria-hidden="true" class="icon-list"></span>&nbsp;icon-list </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-login';"><span class="item"><span aria-hidden="true" class="icon-login"></span>&nbsp;icon-login </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-logout';"><span class="item"><span aria-hidden="true" class="icon-logout"></span>&nbsp;icon-logout </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-loop';"><span class="item"><span aria-hidden="true" class="icon-loop"></span>&nbsp;icon-loop </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-microphone';"><span class="item"><span aria-hidden="true" class="icon-microphone"></span>&nbsp;icon-microphone </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-music-tone';"><span class="item"><span aria-hidden="true" class="icon-music-tone"></span>&nbsp;icon-music-tone </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-music-tone-alt';"><span class="item"><span aria-hidden="true" class="icon-music-tone-alt"></span>&nbsp;icon-music-tone-alt </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-note';"><span class="item"><span aria-hidden="true" class="icon-note"></span>&nbsp;icon-note </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-pencil';"><span class="item"><span aria-hidden="true" class="icon-pencil"></span>&nbsp;icon-pencil </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-pie-chart';"><span class="item"><span aria-hidden="true" class="icon-pie-chart"></span>&nbsp;icon-pie-chart </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-question';"><span class="item"><span aria-hidden="true" class="icon-question"></span>&nbsp;icon-question </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-rocket';"><span class="item"><span aria-hidden="true" class="icon-rocket"></span>&nbsp;icon-rocket </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-share';"><span class="item"><span aria-hidden="true" class="icon-share"></span>&nbsp;icon-share </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-share-alt';"><span class="item"><span aria-hidden="true" class="icon-share-alt"></span>&nbsp;icon-share-alt </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-shuffle';"><span class="item"><span aria-hidden="true" class="icon-shuffle"></span>&nbsp;icon-shuffle </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-size-actual';"><span class="item"><span aria-hidden="true" class="icon-size-actual"></span>&nbsp;icon-size-actual </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-size-fullscreen';"><span class="item"><span aria-hidden="true" class="icon-size-fullscreen"></span>&nbsp;icon-size-fullscreen </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-support';"><span class="item"><span aria-hidden="true" class="icon-support"></span>&nbsp;icon-support </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-tag';"><span class="item"><span aria-hidden="true" class="icon-tag"></span>&nbsp;icon-tag </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-trash';"><span class="item"><span aria-hidden="true" class="icon-trash"></span>&nbsp;icon-trash </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-umbrella';"><span class="item"><span aria-hidden="true" class="icon-umbrella"></span>&nbsp;icon-umbrella </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-wrench';"><span class="item"><span aria-hidden="true" class="icon-wrench"></span>&nbsp;icon-wrench </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-ban';"><span class="item"><span aria-hidden="true" class="icon-ban"></span>&nbsp;icon-ban </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-bubble';"><span class="item"><span aria-hidden="true" class="icon-bubble"></span>&nbsp;icon-bubble </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-camcorder';"><span class="item"><span aria-hidden="true" class="icon-camcorder"></span>&nbsp;icon-camcorder </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-camera';"><span class="item"><span aria-hidden="true" class="icon-camera"></span>&nbsp;icon-camera </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-check';"><span class="item"><span aria-hidden="true" class="icon-check"></span>&nbsp;icon-check </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-clock';"><span class="item"><span aria-hidden="true" class="icon-clock"></span>&nbsp;icon-clock </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-close';"><span class="item"><span aria-hidden="true" class="icon-close"></span>&nbsp;icon-close </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-cloud-download';"><span class="item"><span aria-hidden="true" class="icon-cloud-download"></span>&nbsp;icon-cloud-download </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-cloud-upload';"><span class="item"><span aria-hidden="true" class="icon-cloud-upload"></span>&nbsp;icon-cloud-upload </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-doc';"><span class="item"><span aria-hidden="true" class="icon-doc"></span>&nbsp;icon-doc </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-envelope';"><span class="item"><span aria-hidden="true" class="icon-envelope"></span>&nbsp;icon-envelope </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-eye';"><span class="item"><span aria-hidden="true" class="icon-eye"></span>&nbsp;icon-eye </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-flag';"><span class="item"><span aria-hidden="true" class="icon-flag"></span>&nbsp;icon-flag </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-folder';"><span class="item"><span aria-hidden="true" class="icon-folder"></span>&nbsp;icon-folder </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-heart';"><span class="item"><span aria-hidden="true" class="icon-heart"></span>&nbsp;icon-heart </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-info';"><span class="item"><span aria-hidden="true" class="icon-info"></span>&nbsp;icon-info </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-key';"><span class="item"><span aria-hidden="true" class="icon-key"></span>&nbsp;icon-key </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-link';"><span class="item"><span aria-hidden="true" class="icon-link"></span>&nbsp;icon-link </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-lock';"><span class="item"><span aria-hidden="true" class="icon-lock"></span>&nbsp;icon-lock </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-lock-open';"><span class="item"><span aria-hidden="true" class="icon-lock-open"></span>&nbsp;icon-lock-open </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-magnifier';"><span class="item"><span aria-hidden="true" class="icon-magnifier"></span>&nbsp;icon-magnifier </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-magnifier-add';"><span class="item"><span aria-hidden="true" class="icon-magnifier-add"></span>&nbsp;icon-magnifier-add </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-magnifier-remove';"><span class="item"><span aria-hidden="true" class="icon-magnifier-remove"></span>&nbsp;icon-magnifier-remove </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-paper-clip';"><span class="item"><span aria-hidden="true" class="icon-paper-clip"></span>&nbsp;icon-paper-clip </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-paper-plane';"><span class="item"><span aria-hidden="true" class="icon-paper-plane"></span>&nbsp;icon-paper-plane </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-plus';"><span class="item"><span aria-hidden="true" class="icon-plus"></span>&nbsp;icon-plus </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-pointer';"><span class="item"><span aria-hidden="true" class="icon-pointer"></span>&nbsp;icon-pointer </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-power';"><span class="item"><span aria-hidden="true" class="icon-power"></span>&nbsp;icon-power </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-refresh';"><span class="item"><span aria-hidden="true" class="icon-refresh"></span>&nbsp;icon-refresh </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-reload';"><span class="item"><span aria-hidden="true" class="icon-reload"></span>&nbsp;icon-reload </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-settings';"><span class="item"><span aria-hidden="true" class="icon-settings"></span>&nbsp;icon-settings </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-star';"><span class="item"><span aria-hidden="true" class="icon-star"></span>&nbsp;icon-star </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-symbol-female';"><span class="item"><span aria-hidden="true" class="icon-symbol-female"></span>&nbsp;icon-symbol-female </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-symbol-male';"><span class="item"><span aria-hidden="true" class="icon-symbol-male"></span>&nbsp;icon-symbol-male </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-target';"><span class="item"><span aria-hidden="true" class="icon-target"></span>&nbsp;icon-target </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-volume-1';"><span class="item"><span aria-hidden="true" class="icon-volume-1"></span>&nbsp;icon-volume-1 </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-volume-2';"><span class="item"><span aria-hidden="true" class="icon-volume-2"></span>&nbsp;icon-volume-2 </span></span>
										<span class="item-box" style="cursor:pointer;" onclick="JavaScript:submit_form.icon.value='icon-volume-off';"><span class="item"><span aria-hidden="true" class="icon-volume-off"></span>&nbsp;icon-volume-off </span></span>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <h3 class="block">请选择组件ID</h3>

                                    <div class="form-group">
                                        <div class="col-md-5">
                                            <select multiple="multiple" onchange="JavaScript:selectval();" class="multi-select" id="modelzj" name="modelzj">
                                                <option>charts_amcharts</option>
                                                <option>charts_flotcharts</option>
                                                <option>components_context_menu</option>
                                                <option>components_dropdowns</option>
                                                <option>components_editors</option>
                                                <option>components_form_tools</option>
                                                <option>components_form_tools2</option>
                                                <option>components_ion_sliders</option>
                                                <option>components_jqueryui_sliders</option>
                                                <option>components_knob_dials</option>
                                                <option>components_noui_sliders</option>
                                                <option>components_pickers</option>
                                                <option>ecommerce_index</option>
                                                <option>ecommerce_orders</option>
                                                <option>ecommerce_orders_view</option>
                                                <option>ecommerce_products</option>
                                                <option>ecommerce_products_edit</option>
                                                <option>form_controls</option>
                                                <option>form_controls_md</option>
                                                <option>form_dropzone</option>
                                                <option>form_editable</option>
                                                <option>form_fileupload</option>
                                                <option>form_icheck</option>
                                                <option>form_image_crop</option>
                                                <option>form_layouts</option>
                                                <option>form_validation</option>
                                                <option>form_wizard</option>
                                                <option>inbox</option>
                                                <option>inbox_compose</option>
                                                <option>inbox_inbox</option>
                                                <option>inbox_reply</option>
                                                <option>inbox_view</option>
                                                <option>layout_ajax</option>
                                                <option>layout_ajax_content_1</option>
                                                <option>layout_ajax_content_2</option>
                                                <option>layout_ajax_content_3</option>
                                                <option>layout_blank_page</option>
                                                <option>layout_boxed_page</option>
                                                <option>layout_disabled_menu</option>
                                                <option>layout_fontawesome_icons</option>
                                                <option>layout_full_height_content</option>
                                                <option>layout_full_height_portlet</option>
                                                <option>layout_glyphicons</option>
                                                <option>layout_horizontal_menu1</option>
                                                <option>layout_horizontal_menu2</option>
                                                <option>layout_horizontal_sidebar_menu</option>
                                                <option>layout_language_bar</option>
                                                <option>layout_search_on_header1</option>
                                                <option>layout_search_on_header2</option>
                                                <option>layout_sidebar_closed</option>
                                                <option>layout_sidebar_fixed</option>
                                                <option>layout_sidebar_reversed</option>
                                                <option>layout_sidebar_search_option1</option>
                                                <option>layout_sidebar_search_option2</option>
                                                <option>maps_google</option>
                                                <option>maps_vector</option>
                                                <option>page_about</option>
                                                <option>page_blog</option>
                                                <option>page_blog_item</option>
                                                <option>page_calendar</option>
                                                <option>page_coming_soon</option>
                                                <option>page_contact</option>
                                                <option>page_news</option>
                                                <option>page_news_item</option>
                                                <option>page_portfolio</option>
                                                <option>page_timeline</option>
                                                <option>page_timeline_old</option>
                                                <option>page_todo</option>
                                                <option>portlet_ajax</option>
                                                <option>portlet_ajax_content_1</option>
                                                <option>portlet_ajax_content_2</option>
                                                <option>portlet_ajax_content_3</option>
                                                <option>portlet_draggable</option>
                                                <option>portlet_general</option>
                                                <option>portlet_general2</option>
                                                <option>portlet_general3</option>
                                                <option>quick_sidebar_on_boxed_layout</option>
                                                <option>quick_sidebar_over_content</option>
                                                <option>quick_sidebar_over_content_transparent</option>
                                                <option>quick_sidebar_push_content</option>
                                                <option>quick_sidebar_push_page</option>
                                                <option>table_advanced</option>
                                                <option>table_ajax</option>
                                                <option>table_basic</option>
                                                <option>table_editable</option>
                                                <option>table_managed</option>
                                                <option>table_responsive</option>
                                                <option>table_tree</option>
                                                <option>ui_alert_dialog_api</option>
                                                <option>ui_blockui</option>
                                                <option>ui_bootstrap_growl</option>
                                                <option>ui_buttons</option>
                                                <option>ui_colors</option>
                                                <option>ui_confirmations</option>
                                                <option>ui_datepaginator</option>
                                                <option>ui_extended_modals</option>
                                                <option>ui_extended_modals_ajax_sample</option>
                                                <option>ui_general</option>
                                                <option>ui_icons</option>
                                                <option>ui_idle_timeout</option>
                                                <option>ui_modals</option>
                                                <option>ui_modals_ajax_sample</option>
                                                <option>ui_nestable</option>
                                                <option>ui_notific8</option>
                                                <option>ui_page_progress_style_1</option>
                                                <option>ui_page_progress_style_2</option>
                                                <option>ui_page_progress_style_3</option>
                                                <option>ui_page_progress_style_4</option>
                                                <option>ui_session_timeout</option>
                                                <option>ui_tabs_accordions_navs</option>
                                                <option>ui_tiles</option>
                                                <option>ui_toastr</option>
                                                <option>ui_tree</option>
                                                <option>ui_typography</option>
                                         </select>
                                        </div>
                                        <div class="col-md-7">
                                            <textarea class="form-control autosizeme" id="modelcss" name="modelcss" rows="6" placeholder="显示模块CSS..."></textarea>
                                        </div>
                                        <div class="col-md-7">
                                            <textarea class="form-control autosizeme" id="modelscript" name="modelscript" rows="6" placeholder="显示模块SCRIPT..."></textarea>
                                        </div>
                                        <div class="col-md-7">
                                            <textarea class="form-control autosizeme" id="modelinitscript" name="modelinitscript" rows="6" placeholder="显示模块INIT SCRIPT..."></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="tab4">
                                    <h3 class="block">确认模块信息</h3>
                                    <h4 class="form-section">基本信息</h4>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">模块ID:</label>

                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="name">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">模块标题:</label>

                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="title">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">模块类型:</label>

                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="ismenu">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">模板:</label>

                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="template">
                                            </p>
                                        </div>
                                    </div>
                                        <h4 class="form-section">链接信息</h4>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">模块图标:</label>

                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="icon">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">组件ID:</label>

                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="modelzj">
                                            </p>
                                        </div>
                                    </div>
                                    <h4 class="form-section">加载信息</h4>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">加载css:</label>

                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="modelcss">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">加载JavaScript:</label>

                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="modelscript">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">加载INIT信息:</label>

                                        <div class="col-md-8">
                                            <p class="form-control-static" data-display="modelinitscript">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <a href="javascript:;" class="btn default button-previous">
                                            <i class="m-icon-swapleft"></i> 上一步 </a>
                                        <a href="javascript:;" class="btn blue button-next">
                                            下一步 <i class="m-icon-swapright m-icon-white"></i>
                                        </a>
                                        <a href="javascript:;" class="btn green button-submit">
                                            提 交 <i class="m-icon-swapright m-icon-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- END MAIN CONTENT -->
<!-- BEGIN MAIN JS & CSS -->
<script language="JavaScript" type="text/javascript">
    FormWizard.init();
</script>
<!-- BEGIN MAIN JS & CSS -->