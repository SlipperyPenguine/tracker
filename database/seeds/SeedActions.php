<?php

use Illuminate\Database\Seeder;
use tracker\Models\Action;

class SeedActions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->delete();


        Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '15' , 'DueDate'=> date_create('2/2/2016'), 'title' => 'Data Sciences', 'raised' => 'IS Delivery Meeting', 'description' => 'Raise a new risk and identify resource within Data sciences start knowledge transfer.' )) ;
        Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '25' , 'DueDate'=> date_create('2/2/2016'), 'title' => 'Marcin Replacement', 'raised' => 'IS Delivery Meeting', 'description' => 'Invite John in discussions for Marcin replacement if required.' )) ;
        Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '15' , 'DueDate'=> date_create('2/2/2016'), 'title' => 'New Risks (A&R Statistian)', 'raised' => 'IS Delivery Meeting', 'description' => 'Raise new risks to migitage:

How we ensure that we have coverage across all A&R statistians and trailist that touch data

How can we deal with decision making in a timely fashion
' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '4' , 'DueDate'=> date_create('2/2/2016'), 'title' => 'Resourcing Options (Contractors) ', 'raised' => 'IS Delivery Meeting', 'description' => 'Contact John southam to dicuss contractors suggestions outside OB and approvals.' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '8' , 'DueDate'=> date_create('2/5/2016'), 'title' => 'Revisit the ’post cards from the future’ and update as required', 'raised' => 'Blueprint Meeting', 'description' => 'Liz and Julia revisit the ’post cards from the future’ and update as required.

16/12/15 - Willl raise at the communication meeting on January 5th' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '6' , 'DueDate'=> date_create('2/5/2016'), 'title' => 'CRB Roles and Responsibilites (Slide)', 'raised' => 'CRB/BCM F2F Meeting', 'description' => 'Stuart to review the slide which Stefan Haberberg has created for CRB Roles and Responsibilites.
' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '13' , 'DueDate'=> date_create('2/5/2016'), 'title' => 'Big Picture - Update', 'raised' => 'CRB/BCM F2F Meeting', 'description' => 'Update Big Picture to incorporate changes from workshop
' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '3' , 'DueDate'=> date_create('2/5/2016'), 'title' => 'BPO - Lessons Learnt - Other Programs', 'raised' => 'CRB/BCM F2F Meeting', 'description' => 'BPO - Other programe learnings to be shared (EG: Brett Mant). ' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '3' , 'DueDate'=> date_create('2/5/2016'), 'title' => 'FPLS & Protocol Design Document Required', 'raised' => 'Dependency Workshop January', 'description' => 'A finalized FPLS & Protocol Design Document are both required.
' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '4' , 'DueDate'=> date_create('2/5/2016'), 'title' => 'Technology Delivery Plan Review', 'raised' => 'Dependency Workshop January', 'description' => 'Technology Delivery plan to be reviewed and confirmed. ' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '14' , 'DueDate'=> date_create('2/5/2016'), 'title' => 'Bioplan V6 ', 'raised' => 'Dependency Workshop January', 'description' => 'Confirmation is required regarding Dependency 24. Is there any risk/dependency associated with Bioplan V6 needing to be in stage before site placement UAT.' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '14' , 'DueDate'=> date_create('2/8/2016'), 'title' => 'SLWP Plan Revision', 'raised' => 'Dependency Workshop January', 'description' => 'SLWP Plan requires updating based on new go live date.' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '12' , 'DueDate'=> date_create('2/12/2016'), 'title' => 'Program Update & Blueprint Share ', 'raised' => 'CRB/BCM F2F Meeting', 'description' => 'Tanya to share OB Blueprint & Programme Handbook.
SN 12/1 - blueprint approval SC on 15th Jan and wlll send out approved version 2.0 and the link to the updated PGM Handbook after this.' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '27' , 'DueDate'=> date_create('2/12/2016'), 'title' => 'BCM Org Chart - Roles and Responsibilities', 'raised' => 'CRB/BCM F2F Meeting', 'description' => 'Populate the slide showing BCM - WSL - Projects with Names and include SMEs to indicate which BCM is responsible for whom.
' )) ;
      Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '6' , 'DueDate'=> date_create('2/12/2016'), 'title' => 'BCM Meeting Organization (F2F Feb)', 'raised' => 'CRB/BCM F2F Meeting', 'description' => 'Send out agenda for the BCM Meeting.
' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '3' , 'DueDate'=> date_create('2/12/2016'), 'title' => 'Roll-Out Plan (Go Live Protocol & Site Placement)', 'raised' => 'Dependency Workshop January', 'description' => 'The business needs to ensure that the roll-out plane highlights Go Live for Protocol and Site Placement. What are the challenges/issues?
BCMs need to be followed up with. ' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '28' , 'DueDate'=> date_create('2/12/2016'), 'title' => 'Training Plan Review ', 'raised' => 'Dependency Workshop January', 'description' => 'Training plan needs to be reviews and confirmed. ' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '29' , 'DueDate'=> date_create('2/12/2016'), 'title' => 'Agree where RAIS replacement will be managed', 'raised' => 'CRB', 'description' => 'setup meeting with Deb and Stuart to agree where RAIS replacement will be managed.
' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '3' , 'DueDate'=> date_create('2/12/2016'), 'title' => 'Confirm Seeds name for EAME - Work Execution ', 'raised' => 'IS Delivery Meeting', 'description' => 'Pete needs a Seeds name for EAME and Chad Gater was suggested. Action Tanya to follow up with Stuart.' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '7' , 'DueDate'=> date_create('2/12/2016'), 'title' => 'Rcord CIA sessions for Protocol and SP', 'raised' => 'Business Change Team Meeting', 'description' => 'Record one of the Protocol and SP CIA sessions so that we can send out to those SMEs that did not attend. ' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '7' , 'DueDate'=> date_create('2/15/2016'), 'title' => 'Role Play - Year in a Day', 'raised' => '', 'description' => 'Incorporate changes into scripts and share with training team, organize video recording' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '5' , 'DueDate'=> date_create('2/15/2016'), 'title' => 'MSV Review ', 'raised' => 'Dependency Workshop January', 'description' => 'MVS review needs to take place Mid-Feb. ' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '4' , 'DueDate'=> date_create('2/15/2016'), 'title' => 'Environment Plan Review', 'raised' => 'Dependency Workshop January', 'description' => 'Environment Plan to be reviewed and requirements/availability confirmed.' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '9' , 'DueDate'=> date_create('2/15/2016'), 'title' => 'Dependency Network Mapping', 'raised' => 'Dependency Workshop January', 'description' => 'All PMs need to produce a Dependency Network Mapping of their individual Project(s).
SW to send communication to PMs. ' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '4' , 'DueDate'=> date_create('2/16/2016'), 'title' => 'Environmental Plans & Definition ', 'raised' => 'Dependency Workshop January', 'description' => 'Pete to share environmental plans and defintion. ' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '7' , 'DueDate'=> date_create('2/18/2016'), 'title' => 'Business Focussed Implementation Plan', 'raised' => 'CRB/BCM F2F Meeting', 'description' => 'Consolidate the Business focussed implementation plan, review and present to the CRB' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '3' , 'DueDate'=> date_create('2/19/2016'), 'title' => 'Plans Overlay', 'raised' => 'Dependency Workshop January', 'description' => 'Once Lauriane Cotter, Tekpeki Anim and Pete Munro are working on revised training, technology plans. Once all three plans have been confirmed, they need to be overlaid to ensure that there are no conflicts/challenges.' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '2' , 'DueDate'=> date_create('2/22/2016'), 'title' => 'Understand if SLWP reports back up to a different service to FP?', 'raised' => 'SLWP Workshop 18 February', 'description' => 'Does SLWP report back up to a different service to FP (i.e. something that manages ‘real $’)? - John B (Andy) NB: This needs to feed into the evaluation of options for full scale up and the pilot process work.
' )) ;
      Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '5' , 'DueDate'=> date_create('2/22/2016'), 'title' => 'Protocol MVS / Protocol Dependency 15', 'raised' => 'Dependency Workshop January', 'description' => 'Mike/Tom to review Protocol MVS with regard to protocol dependency 15. Product owner needs to make decision and is either uncomfortable or not empowered to do so. Needs escalation/confirmation with Mike & Tom.
Liz to arrange a call with Peki/Tanya/Mike and Tom
' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '2' , 'DueDate'=> date_create('2/22/2016'), 'title' => 'ARM Definition', 'raised' => 'Dependency Workshop January', 'description' => 'An ARM definition is required. Deadline TBC (placeholder for end of Jan estimate) - Neil Armitage to advise dependant on estimated complexity of action. ' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '2' , 'DueDate'=> date_create('2/22/2016'), 'title' => 'Aditional Data Items', 'raised' => 'Dependency Workshop January', 'description' => 'The key dates for confirming the additional data items need to be confirmed. ' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '6' , 'DueDate'=> date_create('2/26/2016'), 'title' => 'Single BPOC across E2E Process', 'raised' => 'CRB/BCM F2F Meeting', 'description' => 'We need to look at having one BPOC across the end2end process. How could this work? How can we incorporate other processes?
' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '10' , 'DueDate'=> date_create('2/26/2016'), 'title' => 'WSED - Process Workshop Outputs', 'raised' => 'CRB/BCM F2F Meeting', 'description' => 'Define what “It” is vertically/horizontally end to end.
' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '26' , 'DueDate'=> date_create('2/26/2016'), 'title' => 'Add agenda item for BCM F2F', 'raised' => 'Business Change Team Meeting', 'description' => 'Robert asked if we need to match the structure for the Process leads, BPO and Bus Change Manager based on learning from FP Action: Julia to add this to the agenda for the F2F for further discussion' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '29' , 'DueDate'=> date_create('3/5/2016'), 'title' => 'OB Concept & service view - Demand & Supply', 'raised' => 'SLWP Workshop 18 February', 'description' => 'OB Concept & service view – there are sensitivities around the conceptual divide between Demand and Supply that we need to address as this is a fundamental concept in the OB design - Charles (John B/ Tanya/Functional Leads/OBLT/CRB) 5 March
' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '2' , 'DueDate'=> date_create('3/14/2016'), 'title' => 'Agile Coaching (John Booth recommendation)', 'raised' => '', 'description' => 'It was raised at the Risk and Issue meeting on December 15th that John Booth is looking at offering Agile coaching within the business.
Steve Wemyss will work with John Booth regarding this possibility/a training plan. ' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '2' , 'DueDate'=> date_create('3/14/2016'), 'title' => 'WSL Project Dossier', 'raised' => 'IS Delivery Meeting', 'description' => 'Setup a meeting to look at the project project dossier with the WSL to see which projects fit with AGILE delivery.' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '2' , 'DueDate'=> date_create('3/15/2016'), 'title' => 'Agree “Preferred value” concept and if this sits in Analysis and Reporting ', 'raised' => 'SLWP Workshop 18 February', 'description' => 'There are questions around the “Preferred value” concept that need to be addressed and a decision made as to whether this sits in Analysis and Reporting – John B discuss with Rich
' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '16' , 'DueDate'=> date_create('3/16/2016'), 'title' => 'A&R - Single vs. Predictive Data Modeling', 'raised' => 'CRB/BCM F2F Meeting', 'description' => 'A&R to provide an overview of the justification/benefits of Data Model (single-data-model - trial/project based data  vs. predictive data modeling. Create options for review of the CRB (consider - time, scope, quality, costs)
' )) ;
       Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '7' , 'DueDate'=> date_create('3/28/2016'), 'title' => 'Need to understand if synergies is in/out of scope ', 'raised' => 'SLWP Workshop 18 February', 'description' => 'Need to understand if synergies is in/out of scope and discuss the different types of synergies – end March
Concept - David
Process – Andy
' )) ;
      Action::create(array('subject_id' => 1, 'subject_type' => 'Program', 'subject_name' => 'One Biology' ,'status' => 'Open', 'created_by' =>  '1', 'actionee' => '16' , 'DueDate'=> date_create('4/29/2016'), 'title' => 'Key Benefits - A&R', 'raised' => 'CRB/BCM F2F Meeting', 'description' => 'Key Benefits to be defined for all key deliveries which are mature enough (similar to Protocol, Roberts Proposal) - Need benefits for A&R to succeed with protocol (input: SME user stories - transformational)

Additional comments from Rich Burr (as below)

I would probably say these were not high level benefits, but more likely low level, very tangible benefits a hands on user would see.

• Only entering information one time (and that information then shared with other application so duplicate entry and multiple sources of the truth are avoided)
•  Having a single, collaborative protocol design environment for users

These were the items I remembered.  I believe the intent is that our communication with those outside of One Biology is difficult when telling our story regarding “what is changing… what is different” because we just aren’t clear yet.  However, once we have any level of clarity to those, we need to capture them and make them a part of our story.

' )) ;


    }
}
