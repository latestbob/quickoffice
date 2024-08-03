<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\ProjectTeam;
use Auth;
use App\TeamMember;
use App\Milestone;
use App\ProjectTask;
use Illuminate\Support\Str;
use App\Activity;


class ProjectController extends Controller
{
    //admin project


    public function adminproject(){
        $project = Project::where('manager','Zainab Alibaba')->get();
        $team = ProjectTeam::all();
        return view('admin.projects',compact('project','team'));
    }


    //public function createteam

    public function createteam(Request $request){

        $team = new ProjectTeam;

        $team->name = $request->name;

        $team->save();

        return response()->json('Created');
    }


    //get teams

    public function getteams(){
        $team = ProjectTeam::all();

        return response()->json($team);
    }

    //create project

    public function createproject(Request $request){

        // $table->string('title');
            
        //     $table->string('team')->nullable();
        //     $table->string('start_date')->nullable();
        //     $table->string('end_date')->nullable();
        //     $table->integer('percentage_status')->nullable();
        //     $table->string('status')->nullable();
        //     $table->string('stage')->nullable();
        //     $table->string('manager')->nullable();

        $existed = Project::where('title',$request->title)->exists();

        if($existed){
            return back()->with('error','Project Already exists');
        }
        $project = new Project;

        $project->title = $request->title;
        $project->team = $request->team;
        $project->start_date = $request->start;
        $project->end_date = $request->end;
        $project->percentage_status = 0;
        $project->manager = Auth::user()->name;
        $project->urlstring = Str::random(6);


        $project->save();

        return back()->with('msg','Project Created Successfully');
    }


    //update project

    public function updateProject(Request $request){
        
        $project = Project::where('id',$request->id)->update([
            'title' => $request->title,
            'start_date' => $request->start,
            'end_date' => $request->end,
            'team' => $request->team,
            'urlstring' => Str::random(6),
        ]);


        return back()->with('msg','Project Updated Successfully');
    }


    //admin teams page

    public function adminteams(){
        $team = ProjectTeam::all();
        return view('admin.teams',compact('team'));
    }


    //add team members

    public function addteamembers(Request $request){
        $member  = new TeamMember;

        $member->team = $request->team;
        $member->name = $request->name;
        $member->email = $request->email;

        $member->save();

        return back()->with('msg','New Member Added successfully');
    }


    //get members

    public function getMembers(Request $request){
        $member = TeamMember::where('team',$request->team)->get();

        return response()->json($member);

    }


    //delete member

    public function deletemember(Request $request, $id){
        $member = TeamMember::where('id',$id)->delete();

        return back()->with('msg','Member removed successfully');
    }


    //unique project

    public function uniqueproject($id){
        $project = Project::find($id);

        $members = TeamMember::where('team',$project->team)->get();

        $milestone = Milestone::where('project',$project->title)->get();

        return view('admin.uniqueproject',compact('project','members','milestone'));
    }

    //mile stone

    public function milestone(Request $request){
        $milestone = new Milestone;

        $existed = Milestone::where('name',$request->name)->where('project',$request->project)->exists();

        if(!$existed){
            $milestone->name = $request->name;
            $milestone->project = $request->project;
            $milestone->save();

            return response()->json('Milestone created successfully');
        }

        else{
            return response()->json('Milestone already exists');
        }
       



        
    }


    //get milestone

    public function getmilestone($name){
        $milestone = Milestone::where('project',$name)->get();

        return response()->json($milestone);
    }

    //addprojecttask

    public function addprojecttask(Request $request){
        $task = new ProjectTask;


        $members = implode(', ', $request->members);
        
      
        $task->milestone = $request->milestone;
        $task->project  = $request->project;
        $task->title = $request->title;
        $task->start = $request->start;
        $task->end = $request->end;
        $task->responsible = $members;
        $task->percentage = 0;
        $task->team = $request->team;
        $task->output = $request->output;
        $task->save();


        return back()->with('msg','Task Created Successfully');
    }


    //update project task

    public function updateprojecttask(Request $request){
        $members = implode(', ', $request->members);



        $updateData = [
            'milestone' => $request->milestone,
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'responsible' => $members,
            'output' => $request->output,
            'actual_date' => $request->actual_date,
            'percentage' => $request->percentage,
        ];
        
       
           
      
        
        $task = ProjectTask::where('id', $request->id)->update($updateData);

        
        // $task = ProjectTask::where('id',$request->id)->update([
            
        
      
        // 'milestone' => $request->milestone,
     
        // 'title' => $request->title,
        // 'start' => $request->start,
        // 'end' => $request->end,
        // 'responsible' => $members,
        
       
        // 'output' => $request->output,
        // 'actual_date' => $request->actual_date
       
        // ]);

        return back()->with('msg','Project task updated successfully');
    }


    //delete project

    public function deleteprojecttask(Request $request){
        $task = ProjectTask::find($request->id)->delete();

        return back()->with('msg','Project task deleted successfully');
    }


    public function updateTaskStatus(Request $request){

        if(!$request->tasks){
            return back()->with('error','Please check at least 1 task');
        }

        $tasks = $request->tasks;
        
        foreach($tasks as $task){
            $update = ProjectTask::where('project',$request->project)->where('milestone',$request->milestone)->where('title',$task)->update([
                'percentage' => 100,
                'status' => 'done',
                'actual_date' => date('d/m/Y')
            ]);
        }

        return back()->with('msg','Tasks status updated successfully');
    }


    //reverse task project done


    public function updateTaskReverse($id){
        $task = ProjectTask::find($id)->update([
            'percentage' => 0,
            'status' => 'pending',
            'actual_date' => ''
        ]);

        return back();
    }

    //public project 

    public function publicproject($urlstring){
        $project = Project::where('urlstring',$urlstring)->first();

        $members = TeamMember::where('team',$project->team)->get();

        $milestone = Milestone::where('project',$project->title)->get();

        return view('admin.publicproject',compact('project','members','milestone'));
    }


   


    
}
