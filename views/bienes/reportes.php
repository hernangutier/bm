<?php
use app\models\Bienes;
use  yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'BM';
?>
<div class="row">
  <div class="widget-box transparent">
    <div class="widget-header widget-header-flat">
      <h4 class="widget-title lighter">
        <i class="ace-icon fa fa-star orange"></i>
        Estado de los Inventarios
      </h4>
  </div>

<div class="col-sm-12 infobox-container">
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa  fa-server"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?=
                            Bienes::find()->andFilterWhere(['=', 'activo', 1])->andFilterWhere(['=', 'tipobien', 0])->count()
                         ?></span>
												<div class="infobox-content">
                        <a href="<?= Url::to(['bienes/index']) ?>">Bienes Muebles Ir...</a>
                        </div>

											</div>

											<div class="stat stat-success"><?= Bienes::getPercentBm() ?></div>
										</div>

										<div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-ship"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">
                          <?=
                          Bienes::find()->andFilterWhere(['=', 'activo', 1])->andFilterWhere(['=', 'tipobien', 1])->count()
                          ?>
                          </span>

												<div class="infobox-content">
                            <a href="<?= Url::to(['bienes/index-uso']) ?>">Bienes de Uso Ir...</a>
                          </div>
											</div>

											<div class="stat stat-success"><?= Bienes::getPercentBmuso() ?></div>

										</div>

										<div class="infobox infobox-pink">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-shopping-cart"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">8</span>
												<div class="infobox-content">  <a href="<?= Url::to(['bienes/index-uso']) ?>"> Incorporaciones Ir..</a></div>
											</div>
											<div class="stat stat-important">4%</div>
										</div>

										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-flask"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">7</span>
												<div class="infobox-content">Bienes en Reparacion</div>
											</div>
										</div>

										<div class="infobox infobox-orange2">
											<div class="infobox-chart">
												<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"><canvas height="33" width="44" style="display: inline-block; width: 44px; height: 33px; vertical-align: top;"></canvas></span>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">6,251</span>
												<div class="infobox-content">pageviews</div>
											</div>

											<div class="badge badge-success">
												7.2%
												<i class="ace-icon fa fa-arrow-up"></i>
											</div>
										</div>

										<div class="infobox infobox-blue2">
											<div class="infobox-progress">
												<div style="height: 46px; width: 46px; line-height: 45px;" class="easy-pie-chart percentage" data-percent="42" data-size="46">
													<span class="percent">42</span>%
												<canvas width="46" height="46"></canvas></div>
											</div>

											<div class="infobox-data">
												<span class="infobox-text">traffic used</span>

												<div class="infobox-content">
													<span class="bigger-110">~</span>
													58GB remaining
												</div>
											</div>
										</div>

										<div class="space-6"></div>

										<div class="infobox infobox-green infobox-small infobox-dark">
											<div class="infobox-progress">
												<div style="height: 39px; width: 39px; line-height: 38px;" class="easy-pie-chart percentage" data-percent="61" data-size="39">
													<span class="percent">61</span>%
												<canvas width="39" height="39"></canvas></div>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">Task</div>
												<div class="infobox-content">Completion</div>
											</div>
										</div>

										<div class="infobox infobox-blue infobox-small infobox-dark">
											<div class="infobox-chart">
												<span class="sparkline" data-values="3,4,2,3,4,4,2,2"><canvas height="19" width="39" style="display: inline-block; width: 39px; height: 19px; vertical-align: top;"></canvas></span>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">Earnings</div>
												<div class="infobox-content">$32,000</div>
											</div>
										</div>

										<div class="infobox infobox-grey infobox-small infobox-dark">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-download"></i>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">Downloads</div>
												<div class="infobox-content">1,205</div>
											</div>
										</div>
									</div>
          </div>

                  <div class="hr hr32 hr-dotted"></div>

                  <div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Saldo Actual de la Cuenta
												</h4>


											</div>

											<div style="display: block;" class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Descripcion de Saldos
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Saldo Bsf.
																</th>
                                <th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total de Bienes.
																</th>


															</tr>
														</thead>

														<tbody>
															<tr>
																<td>Saldo Anterior</td>

																<td>

																	<b class="blue">1085,00</b>
																</td>

																<td class="hidden-480">
																	<span class="label label-info arrowed-right arrowed-in">1086</span>
																</td>
															</tr>

															<tr>
																<td>Incorporaciones del Mes</td>

																<td>
																	<b class="green">150</b>
																</td>

																<td class="hidden-480">
																	<span class="label label-success arrowed-in arrowed-in-right">12</span>
																</td>
															</tr>

															<tr>
																<td>Desincorporaciones del Mes</td>

																<td>
																	<b class="red">520</b>
																</td>

																<td class="hidden-480">
																	<span class="label label-danger arrowed">70</span>
																</td>
															</tr>

															<tr>
																<td>Desincorporaciones 60 Faltantes por Investigar</td>

																<td>

																	<b class="orange">$19.95</b>
																</td>

                                <td class="hidden-480">
																	<span class="label label-warning arrowed arrowed-right">50</span>
																</td>
															</tr>

															<tr>
																<td><b>Saldo Actual</b></td>

																<td>
																	<b class="blue">$12.00</b>
																</td>

																<td class="hidden-480">
																	<span class="label label-primary arrowed arrowed-right">2012</span>
																</td>
															</tr>
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div>

                  <div class="col-sm-7">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-signal"></i>
													Saldos
												</h4>


											</div>

											<div class="widget-body">
												<div class="widget-main padding-4">
													<div style="width: 100%; height: 220px; padding: 0px; position: relative;" id="sales-charts"><canvas height="176" width="674" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 843px; height: 220px;" class="flot-base"></canvas><div style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);" class="flot-text"><div style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;" class="flot-x-axis flot-x1-axis xAxis x1Axis"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 204px; left: 30px; text-align: center;">0.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 204px; left: 158px; text-align: center;">1.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 204px; left: 287px; text-align: center;">2.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 204px; left: 416px; text-align: center;">3.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 204px; left: 544px; text-align: center;">4.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 204px; left: 673px; text-align: center;">5.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 204px; left: 802px; text-align: center;">6.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 204px; left: 94px; text-align: center;">0.5</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 204px; left: 223px; text-align: center;">1.5</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 204px; left: 351px; text-align: center;">2.5</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 204px; left: 480px; text-align: center;">3.5</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 204px; left: 609px; text-align: center;">4.5</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 204px; left: 737px; text-align: center;">5.5</div></div><div style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;" class="flot-y-axis flot-y1-axis yAxis y1Axis"><div class="flot-tick-label tickLabel" style="position: absolute; top: 192px; left: 1px; text-align: right;">-2.000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 168px; left: 1px; text-align: right;">-1.500</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 144px; left: 1px; text-align: right;">-1.000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 120px; left: 1px; text-align: right;">-0.500</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 96px; left: 4px; text-align: right;">0.000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 72px; left: 4px; text-align: right;">0.500</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 48px; left: 4px; text-align: right;">1.000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 24px; left: 4px; text-align: right;">1.500</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 4px; text-align: right;">2.000</div></div></div><canvas height="176" width="674" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 843px; height: 220px;" class="flot-overlay"></canvas><div class="legend"><div style="position: absolute; width: 62px; height: 66px; top: 13px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;right:13px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(237,194,64);overflow:hidden"></div></div></td><td class="legendLabel">Domains</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(175,216,248);overflow:hidden"></div></div></td><td class="legendLabel">Hosting</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(203,75,75);overflow:hidden"></div></div></td><td class="legendLabel">Services</td></tr></tbody></table></div></div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div>
