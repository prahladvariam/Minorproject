<?php

							if($dkey=='rollnumber')
							{
								echo"<td><input type='text' name='srollno' value='$dval'></td>";
								$temproll=$dval;
							}
							elseif($dkey=='studentName')
							{
								echo"<td><input type='text' name='srollno' value='$dval'></td>";
								$tempname=$dval;
							}
							elseif($dkey=='gender')
							{
								if($dval=='Male')
								{
									echo"<td><select name='gender'>
										<option value='Male' Selected>Male</option>
										<option value='Female'>Female</option>
										<option value='Other'>Other</option>
										</select></td>
										</tr>";
								}
								elseif($dval=="Female")
								{
									echo"<td><select name='gender'>
									<option value='Male'>Male</option>
									<option value='Female' Selected>Female</option>
									<option value='Other'>Other</option>
									</select></td>
									</tr>";
								}
								else
								{
									echo"<td><select name='gender'>
										<option value='Male'>Male</option>
										<option value='Female'>Female</option>
										<option value='Other' Selected>Other</option>
										</select></td>
										</tr>";
										$tempgender=$dval;
								}
			?>