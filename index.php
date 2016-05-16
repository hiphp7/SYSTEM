<?php
require_once ("include/global.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $db->ly_system("system",2)?></title>
<META name=keywords content="<?php echo $db->ly_system("system",3)?>">
<meta name="description"
	content="<?php echo $db->ly_system("system",4)?>">
<link href="image/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<table width="1000" border="0" align="center" cellpadding="0"
		cellspacing="0">
		<tr>
			<td width="196"><a href="<?php echo $db->ly_system("system",5)?>"
				title="<?php echo $db->ly_system("system",1)?>" target="_blank"><img
					src="image/xxcms_logo.jpg" width="196" height="73" border="0"></a></td>
			<td width="616" align="center"><img src="image/xxcms_ad.jpg"
				width="540" height="73"></td>
			<td width="188"><table width="90%" border="0" align="right"
					cellpadding="0" cellspacing="0">
					<tr>
						<td width="49%" align="center">[<a href="index.php"
							class="xx_menu_top">返回首页 </a>]
						</td>
						<td width="51%" align="center">［<a href="group/2.html"
							target="_blank" class="xx_menu_top">版权声明</a>］
						</td>
					</tr>
					<tr>
						<td align="center">［<a href="#" class="xx_menu_top">加入收藏</a>］
						</td>
						<td align="center">［<a href="group/3.html" target="_blank"
							class="xx_menu_top">网站地图</a>］
						</td>
					</tr>
					<tr>
						<td align="center">［<a href="group/1.html" target="_blank"
							class="xx_menu_top">关于我们</a>］
						</td>
						<td align="center">［<a href="group/4.html" target="_blank"
							class="xx_menu_top">联系我们</a>］
						</td>
					</tr>
				</table></td>
		</tr>
	</table>
	<table width="1000" border="0" align="center" cellpadding="0"
		cellspacing="0" class="menu">
		<tr>
			<td width="10" align="left" background="image/xxcms_bg_menu.jpg"><img
				src="image/xxcms_left_menu.jpg" width="8" height="60"></td>
			<td width="979" align="center" valign="middle"
				background="image/xxcms_bg_menu.jpg"><script type="text/javascript"
					src="include/Function.php?action=menu2"></script></td>
			<td width="11" align="right" background="image/xxcms_bg_menu.jpg"><img
				src="image/xxcms_right_menu.jpg" width="8" height="60"></td>
		</tr>
	</table>
	<table width="1000" border="0" align="center" cellpadding="0"
		cellspacing="0">
		<tr>
			<td height="5"></td>
		</tr>
	</table>
	<table width="1000" border="0" align="center" cellpadding="0"
		cellspacing="0">
		<tr>
			<td width="293" height="192" align="center" valign="top"><table
					width="100%" height="330" border="0" cellpadding="0"
					cellspacing="0" class="xxcms_border">
					<tr>
						<td height="26" background="image/xxcms_hdp.jpg"
							class="xxcms_title">&nbsp;&nbsp;&nbsp;推荐新闻</td>
					</tr>
					<tr>
						<td><table width="88%" border="0" align="center" cellpadding="0"
								cellspacing="0">

								<tr>
									<td align="left">
         <?php
									$sql = "select * from newscontent where is_hot=1 order by newsid desc limit 0,3";
									$rs = mysql_query ( $sql );
									{
										$pics = $links = $texts = '';
										while ( $rows = mysql_fetch_assoc ( $rs ) ) {
											// 连续定义变量，输出格式字符串
											$pics .= substr ( CMS_URL, 0, - 1 ) . $rows ['newspic'] . "|";
											$links .= "news/" . $rows ['newspath'] . "|";
											$texts .= $rows ['newstitle'] . "|";
										}
										$pics = substr ( $pics, 0, - 1 );
										$links = substr ( $links, 0, - 1 );
										$texts = substr ( $texts, 0, - 1 );
										?>
 		<script type="text/javascript">
			//<![CDATA[
			var interval_time=0;
			var focus_width=278;
			var focus_height=278;
			var text_height=0;
			var text_align="center";
			var swf_height=focus_height+text_height;
			var pics="<?php echo $pics?>";
			var links="<?php echo $links?>";
			var texts="<?php echo $texts?>";
			document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">');
			document.write('<param name="allowScriptAccess" value="sameDomain" /><param name="movie" value="image/focus.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#F0F0F0">');
			document.write('<param name="menu" value="false"><param name=wmode value="transparent">');
			document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'">');
			document.write('<embed src="/image/focus.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'" menu="false" bgcolor="#F0F0F0" quality="high" width="'+ focus_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
			document.write('</object>');
			//]]>
			</script>        
        <?php
									}
									?></td>
								</tr>
							</table></td>
					</tr>
				</table></td>
			<td width="487" align="center" valign="top"><table width="475"
					height="330" border="0" cellpadding="0" cellspacing="0"
					class="xxcms_border">
					<tr>
						<td height="173" valign="top"><table width="475" border="0"
								cellpadding="0" cellspacing="0">
								<tr>
									<td width="38" height="26" align="center"
										background="image/xxcms_bg_t.jpg"><img
										src="image/xxcms_arr.jpg" width="16" height="22"></td>
									<td width="383" align="left" background="image/xxcms_bg_t.jpg"
										class="xxcms_title">新闻头条</td>
								</tr>
							</table>
							<table width="98%" height="28" border="0" align="center"
								cellpadding="0" cellspacing="0">
  		<?php echo $db->select("newscontent","*","3","12","1","50","1")?>
          </table></td>
					</tr>
				</table></td>
			<td width="220" align="center" valign="top"><table width="100%"
					height="330" border="0" cellpadding="0" cellspacing="0"
					class="xxcms_border">
					<tr>
						<td height="173" valign="top"><table width="100%" border="0"
								cellpadding="0" cellspacing="0">
								<tr>
									<td width="27" height="26" align="center"
										background="image/xxcms_bg_t.jpg"><img
										src="image/xxcms_icon_right.jpg" width="4" height="11"></td>
									<td width="191" align="left" background="image/xxcms_bg_t.jpg"
										class="xxcms_title">图文推荐</td>
								</tr>
							</table>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
	  
	   <?php
				$rs = mysql_query ( "select * from newscontent where newspic<>'' order by newsid desc limit 0,4" )?>
        <?php
								
								$i = 0;
								while ( $row = mysql_fetch_assoc ( $rs ) ) {
									?>
        <td height="57" align="center"><table width="100%" border="0"
											cellspacing="0" cellpadding="0">
											<tr>
												<td height="10"></td>
											</tr>
										</table>
										<table width="80%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td width="80%" height="38"><table width="100%" border="0"
														cellpadding="0" cellspacing="1">
														<tr>
															<td height="45" align="center"><a
																href="news/<?php echo $row["newspath"]?>"
																target="_blank" title="<?php echo $row["newstitle"]?>"><IMG
																	height=110
																	src="<?php echo substr(CMS_URL, 0,-1).$row["newspic"]?>"
																	width=88 border=0></A></td>
														</tr>
														<tr>
															<td height="20" align="center"><a
																href="news/<?php echo $row["newspath"]?>"
																title="<?php echo $row["newstitle"] ?>" target="_blank"><?php echo substr($row["newstitle"],0,12)?></a>
															</td>
														</tr>
													</table></td>
												<td width="10"></td>
											</tr>
										</table></td>
        <?php
									$i ++;
									if ($i % 2 == 0) {
										echo "</tr><tr>";
									}
								}
								?>
        </tr>
							</table></td>
					</tr>
				</table></td>
		</tr>
	</table>
	<table width="1000" border="0" align="center" cellpadding="0"
		cellspacing="0">
		<tr>
			<td height="5"></td>
		</tr>
	</table>
	<table width="1000" border="0" align="center" cellpadding="0"
		cellspacing="0">
		<tr>
			<td width="293" height="192" align="center" valign="top"><table
					width="100%" height="300" border="0" cellpadding="0"
					cellspacing="0" class="xxcms_border">
					<tr>
						<td height="26" valign="top" background="image/xxcms_bg_t.jpg"><table
								width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="33%" align="center" background="image/xxcms_hdp.jpg"
										class="xxcms_title">网页制作</td>
									<td width="67%">&nbsp;</td>
								</tr>
							</table></td>
					</tr>
					<tr>
						<td valign="top">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td height="10"></td>
								</tr>
							</table>
							<table width="100%" height="28" border="0" align="center"
								cellpadding="0" cellspacing="0">
	<?php echo $db->select("newscontent","*","3","10","1","26","1")?>
  </table>
						</td>
					</tr>
				</table></td>
			<td width="487" align="center" valign="top"><table width="475"
					height="300" border="0" cellpadding="0" cellspacing="0"
					class="xxcms_border">
					<tr>
						<td height="26" valign="top" background="image/xxcms_bg_t.jpg"><table
								width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="95" align="center" background="image/xxcms_hdp.jpg"
										class="xxcms_title">网络教程</td>
									<td>&nbsp;</td>
								</tr>
							</table></td>
					</tr>
					<tr>
						<td height="250" valign="top">


							<table width="100%" border="0" cellpadding="0" cellspacing="0"
								class="line">
								<tr>
									<td height="120" align="center"><img src="image/xxcms_pic1.jpg"
										width="106" height="98"></td>
									<td><table width="100%" height="28" border="0" align="center"
											cellpadding="0" cellspacing="0">
<?php echo $db->select("newscontent","*","3","5","1","37","1")?>
          </table></td>
								</tr>
							</table>

							<table width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td height="120" align="center"><img src="image/xxcms_pic2.jpg"
										width="106" height="98"></td>
									<td><table width="100%" height="28" border="0" align="center"
											cellpadding="0" cellspacing="0">
<?php echo $db->select("newscontent","*","5","5","1","37","1")?>
          </table></td>
								</tr>
							</table>
						</td>
					</tr>
				</table></td>
			<td width="220" align="center" valign="top"><table width="100%"
					height="300" border="0" cellpadding="0" cellspacing="0"
					class="xxcms_border">
					<tr>
						<td height="173" valign="top"><table width="100%" border="0"
								cellpadding="0" cellspacing="0">
								<tr>
									<td width="38" height="26" align="center"
										background="image/xxcms_bg_t.jpg"><img
										src="image/xxcms_icon_right.jpg" width="4" height="11"></td>
									<td width="383" align="left" background="image/xxcms_bg_t.jpg"
										class="xxcms_title">CMS教程</td>
									<td width="52" align="center" background="image/xxcms_bg_t.jpg"><img
										src="image/xxcms_more.jpg" width="34" height="11"></td>
								</tr>
							</table>

							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td height="10"></td>
								</tr>
							</table>
							<table width="100%" height="28" border="0" align="center"
								cellpadding="0" cellspacing="0">
		<?php echo $db->select("newscontent","*","3","10","1","32","")?>
          </table></td>
					</tr>
				</table></td>
		</tr>
	</table>
	<table width="1000" border="0" align="center" cellpadding="0"
		cellspacing="0">
		<tr>
			<td height="5"></td>
		</tr>
	</table>
	<table width="1000" height="150" border="0" align="center"
		cellpadding="0" cellspacing="0" class="xxcms_border">
		<tr>
			<td height="26" background="image/xxcms_bg_t.jpg" class="xxcms_title"><table
					width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="11%" align="center" background="image/xxcms_hdp.jpg"
							class="xxcms_title">图片文章</td>
						<td width="89%">&nbsp;</td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
        <?php
								$rs = mysql_query ( "select * from newscontent where newspic<>'' order by newsid desc limit 0,7" )?>
        <?php
								
								$i = 0;
								while ( $row = mysql_fetch_assoc ( $rs ) ) {
									?>
        <td height="57" align="center"><table width="100%" border="0"
								cellspacing="0" cellpadding="0">
								<tr>
									<td height="10"></td>
								</tr>
							</table>
							<table width="80%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="80%" height="38"><table width="100%" border="0"
											cellpadding="0" cellspacing="1">
											<tr>
												<td height="45" align="center"><a
													href="news/<?php echo $row["newspath"]?>" target="_blank"
													title="<?php echo $row["newstitle"]?>"><IMG height=100
														src="<?php echo substr(CMS_URL, 0,-1).$row["newspic"]?>"
														width=100 border=0></A></td>
											</tr>
											<tr>
												<td height="20" align="center"><a
													href="news/<?php echo $row["newspath"]?>"
													title="<?php echo $row["newstitle"] ?>" target="_blank"><?php echo substr($row["newstitle"],0,12)?></a>
												</td>
											</tr>
										</table></td>
									<td width="10"></td>
								</tr>
							</table>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td height="5"></td>
								</tr>
							</table></td>
        <?php
									$i ++;
									if ($i % 7 == 0) {
										echo "</tr><tr>";
									}
								}
								?>
      </tr>
				</table></td>
		</tr>
	</table>
	<table width="1000" border="0" align="center" cellpadding="0"
		cellspacing="0">
		<tr>
			<td height="5"></td>
		</tr>
	</table>
	<table width="1000" border="0" align="center" cellpadding="0"
		cellspacing="0">
		<tr>
			<td width="293" height="192" align="center" valign="top"><table
					width="100%" height="300" border="0" cellpadding="0"
					cellspacing="0" class="xxcms_border">
					<tr>
						<td height="26" valign="top" background="image/xxcms_bg_t.jpg"><table
								width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="33%" align="center" background="image/xxcms_hdp.jpg"
										class="xxcms_title">电子教程</td>
									<td width="67%">&nbsp;</td>
								</tr>
							</table></td>
					</tr>
					<tr>
						<td valign="top"><table width="100%" border="0" cellspacing="0"
								cellpadding="0">
								<tr>
									<td height="10"></td>
								</tr>
							</table>
							<table width="100%" height="28" border="0" align="center"
								cellpadding="0" cellspacing="0">
              <?php echo $db->select("newscontent","*","3","10","1","26","1")?>
          </table></td>
					</tr>
				</table></td>
			<td width="487" align="center" valign="top">


				<table width="475" height="300" border="0" cellpadding="0"
					cellspacing="0" class="xxcms_border">
					<tr>
						<td height="26" valign="top" background="image/xxcms_bg_t.jpg"><table
								width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="95" align="center" background="image/xxcms_hdp.jpg"
										class="xxcms_title">媒体动画</td>
									<td>&nbsp;</td>
								</tr>
							</table></td>
					</tr>
					<tr>
						<td height="250" valign="top">


							<table width="100%" border="0" cellpadding="0" cellspacing="0"
								class="line">
								<tr>
									<td height="120" align="center"><img src="image/xxcms_pic1.jpg"
										width="106" height="98"></td>
									<td><table width="100%" height="28" border="0" align="center"
											cellpadding="0" cellspacing="0">
<?php echo $db->select("newscontent","*","3","5","1","37","1")?>
          </table></td>
								</tr>
							</table>

							<table width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td height="120" align="center"><img src="image/xxcms_pic2.jpg"
										width="106" height="98"></td>
									<td><table width="100%" height="28" border="0" align="center"
											cellpadding="0" cellspacing="0">
<?php echo $db->select("newscontent","*","5","5","1","37","1")?>
          </table></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>



			</td>
			<td width="220" align="center" valign="top"><table width="100%"
					height="300" border="0" cellpadding="0" cellspacing="0"
					class="xxcms_border">
					<tr>
						<td height="173" valign="top"><table width="100%" border="0"
								cellpadding="0" cellspacing="0">
								<tr>
									<td width="38" height="26" align="center"
										background="image/xxcms_bg_t.jpg"><img
										src="image/xxcms_icon_right.jpg" width="4" height="11"></td>
									<td width="383" align="left" background="image/xxcms_bg_t.jpg"
										class="xxcms_title">网站运营</td>
									<td width="52" align="center" background="image/xxcms_bg_t.jpg"><img
										src="image/xxcms_more.jpg" width="34" height="11"></td>
								</tr>
							</table>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td height="10"></td>
								</tr>
							</table>
							<table width="100%" height="28" border="0" align="center"
								cellpadding="0" cellspacing="0">
			<?php echo $db->select("newscontent","*","3","10","1","32","")?>
            </table></td>
					</tr>
				</table></td>
		</tr>
	</table>
	<table width="1000" border="0" align="center" cellpadding="0"
		cellspacing="0">
		<tr>
			<td height="5"></td>
		</tr>
	</table>
	<table width="1000" border="0" align="center" cellpadding="0"
		cellspacing="0">
		<tr>
			<td width="293" height="192" align="center" valign="top"><table
					width="100%" height="300" border="0" cellpadding="0"
					cellspacing="0" class="xxcms_border">
					<tr>
						<td valign="top"><table width="100%" border="0" cellpadding="0"
								cellspacing="0">
								<tr>
									<td width="38" height="26" align="center"
										background="image/xxcms_bg_t.jpg"><img
										src="image/xxcms_icon_right.jpg" width="4" height="11"></td>
									<td width="383" align="left" background="image/xxcms_bg_t.jpg"
										class="xxcms_title">网络安全</td>
									<td width="52" align="center" background="image/xxcms_bg_t.jpg"><img
										src="image/xxcms_more.jpg" width="34" height="11"></td>
								</tr>
							</table>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td height="10"></td>
								</tr>
							</table>
							<table width="100%" height="28" border="0" align="center"
								cellpadding="0" cellspacing="0">
<?php echo $db->select("newscontent","*","3","10","1","26","1")?>
          </table></td>
					</tr>
				</table></td>
			<td width="487" align="center" valign="top"><table width="475"
					height="300" border="0" cellpadding="0" cellspacing="0"
					class="xxcms_border">
					<tr>
						<td align="center" valign="top"><table width="100%" border="0"
								cellpadding="0" cellspacing="0">
								<tr>
									<td width="38" height="26" align="center"
										background="image/xxcms_bg_t.jpg"><img
										src="image/xxcms_icon_right.jpg" width="4" height="11"></td>
									<td width="383" align="left" background="image/xxcms_bg_t.jpg"
										class="xxcms_title">广告代码</td>
									<td width="52" align="center" background="image/xxcms_bg_t.jpg"><img
										src="image/xxcms_more.jpg" width="34" height="11"></td>
								</tr>
							</table>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td height="10"></td>
								</tr>
							</table>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td><table width="100%" height="28" border="0" align="center"
											cellpadding="0" cellspacing="0">
                <?php
																$sql = "select * from newscontent where newstypeid=3 order by newsid desc limit 0,10";
																$rs = mysql_query ( $sql );
																while ( $rows = mysql_fetch_assoc ( $rs ) ) {
																	?>
                <tr class="line">
												<td width="20" height="25" align="center"><img
													src="image/xxcms_icon.jpg" width="4" height="4" /></td>
												<td align="left"><a
													href="news/<?php echo $rows["newspath"]?>"
													title="<?php echo $rows["newstitle"] ?>" target="_blank"><?php echo substr($rows["newstitle"],0,30) ?></a></td>
											</tr>
                <?php
																}
																?>
              </table></td>
									<td><table width="100%" height="28" border="0" align="center"
											cellpadding="0" cellspacing="0">
				<?php echo $db->select("newscontent","*","3","10","1","32","")?>
              </table></td>
								</tr>
							</table></td>
					</tr>
				</table></td>
			<td width="220" align="center" valign="top"><table width="100%"
					height="300" border="0" cellpadding="0" cellspacing="0"
					class="xxcms_border">
					<tr>
						<td height="173" valign="top"><table width="100%" border="0"
								cellpadding="0" cellspacing="0">
								<tr>
									<td width="38" height="26" align="center"
										background="image/xxcms_bg_t.jpg"><img
										src="image/xxcms_icon_right.jpg" width="4" height="11"></td>
									<td width="383" align="left" background="image/xxcms_bg_t.jpg"
										class="xxcms_title">在线手册</td>
									<td width="52" align="center" background="image/xxcms_bg_t.jpg"><img
										src="image/xxcms_more.jpg" width="34" height="11"></td>
								</tr>
							</table>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td height="10"></td>
								</tr>
							</table>
							<table width="100%" height="28" border="0" align="center"
								cellpadding="0" cellspacing="0">
                <?php
																$sql = "select * from newscontent where newstypeid=3 order by newsid desc limit 0,10";
																$rs = mysql_query ( $sql );
																while ( $rows = mysql_fetch_assoc ( $rs ) ) {
																	?>
                <tr class="line">
									<td width="20" height="25" align="center"><img
										src="image/xxcms_icon.jpg" width="4" height="4" /></td>
									<td align="left"><a href="news/<?php echo $rows["newspath"]?>"
										title="<?php echo $rows["newstitle"] ?>" target="_blank"><?php echo substr($rows["newstitle"],0,32) ?></a></td>
								</tr>
                <?php
																}
																?>
            </table></td>
					</tr>
				</table></td>
		</tr>
	</table>
	<table width="1000" border="0" align="center" cellpadding="0"
		cellspacing="0">
		<tr>
			<td height="5"></td>
		</tr>
	</table>
	<table width="1000" border="0" align="center" cellpadding="0"
		cellspacing="0" bgcolor="#DCDCDC">
		<tr>
			<td height="1"></td>
		</tr>
	</table>
	<table width="1000" border="0" align="center" cellpadding="0"
		cellspacing="0">
		<tr>
			<td height="45" align="center"><?php echo $db->ly_system("system",6)?></td>
		</tr>
	</table>
</body>
</html>