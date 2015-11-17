<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 13/11/2015
 * Time: 19:47
 */
include_once(dirname(__FILE__)."\..\phpModel\courseOutline.php");

class courseOutlineControl extends courseOutline
{
/*Akpene
 *Adding a course outline
 */
public function addCourseControl(){
						<p><div> <div class='headers'> Course Objectives </div><textarea class='css' col="10" row="20" id="course_objective" name="course_objective"></textarea></div>
						</p>
						<p><div> <div class='headers'> Course Description </div> <textarea class='css' col="10" row="20" id="course_description" name="course_description"></textarea></div>
						</p>
						<div> <div class='headers'> Learning Goals </div> <textarea class='css' col="20" row="10" id="learning_goals" name="learning_goals"></textarea></div>
						<p>
							//<div class='headers' id="scheduler" name="scheduler"> Course Schedule 

								//<table id="schedule" name="schedule" border="1" width="100%" align="center">
									//<div id="schedule_header" name="schedule_header"> <tr id='table_headers' name='table_headers'> 
										//<td><b>Weeks</b></td>
										//<td><b>Topics</b></td>
										//<td><b>Readings</b></td>
										//<td><b>Milestones</b></td>
									//</tr></div>
								//</table></div>

								<div> <input type="button" onclick="addRow()" value="Add Row"></div>
							</p>
							<p>
								<div> <div class='headers'> Course Evaluations </div> <textarea class='ckeditor' col="10" row="10" id="course_evaluations" name="course_evaluations"></textarea></div>
							</p>
							<p>
								<div> <div class='headers'> Course Readings </div> <textarea class='ckeditor' col="10" row="10" id="course_readings" name="course_readings"></textarea></div>
							</p>
							<div> <input type="submit" value="Save"></div>
						</form>
						
					</div>
				</td>
			</tr>

		</table>
		<p id="footer" >
					Copyright &copy Webtech Group 9
				</p>

	</div>
}
}