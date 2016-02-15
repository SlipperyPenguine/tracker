<?php

use Illuminate\Database\Seeder;
use tracker\Models\Comment;

class SeedComments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();

        Comment::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => 'SW to talk to Deb to raise PI, start and end dates need to be understood and aligned to program deployment plan',  ));
        Comment::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '15/04 Update: High level plan has been shared (where?) logical option for PM seems Sally although will not be 100% resource allocation with Dan. Needs sharing with PO for tracking',  ));
        Comment::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/6 SN - added next gate date 9 Jul, Next Gate is G1.',  ));
        Comment::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '30/6 SN - Prtoocol is dependant on SLWP and there is a risk that it may not deliver on time.  Pete to check Sallys presentation – training plans for southern/Northern hemisphere',  ));
        Comment::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => ' Stefan to work with the WSL to develop the overall pgm plans and test dependancies',  ));
        Comment::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => ' Training preperation needs to start this year ready for Q1/2 training to fit with continutous planning cycle (opex Spend).',  ));
        Comment::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '15/7 - PRM G1 nearly ready for CRB approval and may need to be virtual.',  ));
        Comment::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '5/8 - PRM Prog Board G1 approval 29th Jul, continuing planning exercise, working with BCM\'s to assess when training needs to be completed by (Dan Dyer Seeds - Feb 16)',  ));
        Comment::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '17/8 PRM - G1 CRB due 25/8 - acceleration options are being discussed',  ));
        Comment::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '2/9 PRM acceleration options and exact go-live need still under discussion but project progressing. Meetings in place to address questions around what tool the the preference for where is placed are ongoing.',  ));
        Comment::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '14/9 PRM - Still a challenge that the planned delivery date does not meet the required go-live, also finalizing decision on in which system propose site should take place.',  ));
        Comment::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '11/11 TOM due to go to CRB 25th Nov but business non compliance on updating of status e.g planned, committed may mean this is delayed.',  ));
        Comment::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '24/11 - Delays on TOM may require a us to submit a ""Work at risk"" proposal similar to that for Protocol.',  ));
        Comment::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '15/1 PRM Work at risk was approved by CRB in Dec',  ));

        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => 'SW to talk to Deb to raise PI, start and end dates need to be understood and aligned to program deployment plan.',  ));
        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '15/04 Update: Need to identify SME\'s and understand share output from Pilot meeting. The core SME requirement should be <10.',  ));
        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/4 Working with John F present draft plan to CRB F2f, Agile approach agreed.',  ));
        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '11/6/2015 BCM site created and Concept paper started. Requested PM & SA resource.',  ));
        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/6 SN - amended last gate passed to G1 (prev G0) and added Next gate date 9 Jul.',  ));
        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/06/15 PRM - Project Manager being recruited.30/6 SN - Klaus meeting Martin Clough tomrorow to identify Product Owner (JH or EAME based)',  ));
        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '30/6 SN - Marcin onboarded as SA and another SA may  be required. Revieiwng CV\'s for external PM. Pete to follow up wth Avinash\'s availability.',  ));
        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '15/7 PRM - Peki assigned as PM and Neil Armitige starting 27 July as Integration PM for Protocol  & SLWP. Progressing to plan.',  ));
        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '5/8 PRM G1 materials should be ready by 7th Aug.',  ));
        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '17/8 PRM - project will go to Program Board 20/8, CRB 25/8, (SC 19th info only)',  ));
        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '2/9 PRM G1 approvals from Program Board and CRB complete.',  ));
        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '14/9 PRM Magenic SOW issue now resolved. Trying to identify Protocol process owner to assist with TOM.',  ));
        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '11/11 Challenges from CRB on TOM have delayed approval which is having an impact on preparation for G2. We will likely need approval to start development at risk. Also need to confirm replacement APO for Ursual E-W Pete following up with Stuart H.',  ));
        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '24/11 Confusion over what is required for the Minimum Marketable Set may impact project timelines and/or budget. The issue and potential mitigation being assessed.',  ));
        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '15/1 PRM MVS has been signed off by PO but further review will take place.',  ));
        Comment::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '2/2 PRM Still progressing to Gate 2 for Feb. Working on getting quick decisions on integration requirements with input from PO and BCM\'s. New Project Manager due to start 15th Feb.',  ));

        Comment::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => 'Peru Consulting, the integration experts have provided an initial proposal and we are working through it and providing adjustments around costs and deliverables.',  ));
        Comment::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => 'The revised quotation has been sent through to Nasir as a part of the pre planning work.',  ));
        Comment::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/5 - Steve meeting Nasir to discuss review bodies & approval dates. Peru are doing the Analysis work. R2 due 2nd June',  ));
        Comment::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '11/6/2015 PRM - Quotes for Peru work significantly different and options being assessed. will go to PGM Board for G2 sign-off 18 June',  ));
        Comment::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/6 SN - added next gate Dec-15 and ameded last gate passsed to G1(prev G0) appoved at Pgm Board 18 June.',  ));
        Comment::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '30/6 presented to CRB last weekand there was a question around legacy integration - feedback was positive, Need to get back to SMC ops board and also clarify wording on the Peru slide deck.',  ));
        Comment::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '15/7 PRM - Confirm completion date Jan 16 after kick off mtg (30/7) CR may be required on spend.',  ));
        Comment::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '6/8 PM - consultants started',  ));
        Comment::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '20/8 - reviewing which interfaces need to be addressed 1st based on the agreed list.',  ));
        Comment::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '2/9 PRM - project progressing.',  ));
        Comment::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '14/9 PRM - still progressing.',  ));
        Comment::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '11/11 PRM - still progressing but need to confirm a Product Manager for the Service.',  ));
        Comment::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '15/1 PRM - Verna comoing back with propsoal on Prod Man and Prod Specialist. Pre-prod and Prod servers purchase also being escalated.',  ));
        Comment::create(array('subject_id' => 5, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '2/2 Have delivery dates now on servers. Still chasing on Product Manager.',  ));

        Comment::create(array('subject_id' => 8, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/5 - Need to start thinking about how/when we stop people using FPLS.',  ));
        Comment::create(array('subject_id' => 8, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '30/6 SN - SLWP users will also need to access finance and permit data in FPLS and may need to double entry data. Pete to setup a meeting to determine how we replace the remaining  permit & finance funtionality and provide update at the next meeting.',  ));
        Comment::create(array('subject_id' => 8, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '5/8 - PRM - need Solution Architect  and Scientfici Analyst to help scope?',  ));
        Comment::create(array('subject_id' => 8, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '17/8 - PRM - Pete will check if Matt Taylor could give a few hours to this.',  ));
        Comment::create(array('subject_id' => 8, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '2/9 PRM - Neil now taking forward. Pete to talk with Jason re: need for new SA resource and Sol Architect.',  ));
        Comment::create(array('subject_id' => 8, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '14/9 PRM - Early draft Concept paper in development.',  ));
        Comment::create(array('subject_id' => 8, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '11/11 Exact scope needs input from scope of SLWP and Protocol, Neil still progressing. Perhaps change project name and have a separate project for the actual decommissioning?',  ));
        Comment::create(array('subject_id' => 8, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '15/1 PRM Decommisoning is sepate project now. Need to confirm an interim Project Manager due to Neil A leaving.',  ));
        Comment::create(array('subject_id' => 8, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '2/2 Sally Pullar confirmed as Project Manager and is now progressing',  ));

        Comment::create(array('subject_id' => 9, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => 'Should consider launching as a project, with planning credit to build mock up.',  ));
        Comment::create(array('subject_id' => 9, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => 'There are discussions in other projects on separate tools so this is gaining urgency.',  ));
        Comment::create(array('subject_id' => 9, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => 'We need to be aware of the Opex impact of doing this on the already tight 2016 budget.',  ));
        Comment::create(array('subject_id' => 9, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/4 - Should consider re-naming this? JB  recommends Agile approach. Started the concept paper   - Chiara would be good R&D sponsor to help build concept paper.',  ));
        Comment::create(array('subject_id' => 9, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '15/7 PRM - evaluation work started',  ));
        Comment::create(array('subject_id' => 9, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '6/8 RB -John and Dan working with providers to do prototype and work on scope statement. Meeting required to clarify scope/progress etc. & provide update at next meeting',  ));
        Comment::create(array('subject_id' => 9, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '20/8 - SN SOW being challenged',  ));
        Comment::create(array('subject_id' => 9, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '2/9 SN Deb is updating the scoping document. Needs to be re-presented to PGM Board.',  ));
        Comment::create(array('subject_id' => 9, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '11/11 PRM quote from Backbase was considered high so now engaging with Magenic.',  ));
        Comment::create(array('subject_id' => 9, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '15/1 PRM - SOW signed.Wireframes being produced over the next 2-3 weeks.',  ));
        Comment::create(array('subject_id' => 9, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '2/2 PRM SME\'s reviewing wireframes',  ));

        Comment::create(array('subject_id' => 10, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => 'Pilot dependant on POC, estimate Q3 start ',  ));
        Comment::create(array('subject_id' => 10, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/5 - Concept paper started and will feed into Analysis & Reporting Pilot',  ));
        Comment::create(array('subject_id' => 10, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '11/6 progressing to plan and will be presented to PB next week.Need to request PM',  ));
        Comment::create(array('subject_id' => 10, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '30/6 SN - Exec Summary approved at CRB/PB and 10% planning credit approved.. Rich sent request for R&DIS resources to Dan.  ',  ));
        Comment::create(array('subject_id' => 10, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '* G1 documents in progress - working toward an August 20th Program Board approval',  ));
        Comment::create(array('subject_id' => 10, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '26/8 SN - G1 approved at PB and CRB. ',  ));
        Comment::create(array('subject_id' => 10, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '10/11 - SoW with Tessella in place; Hack-a-thon planned for late Nov',  ));
        Comment::create(array('subject_id' => 10, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '23/11 - PM Zaheer Mirza started today; Workshop pushed into Dec ',  ));
        Comment::create(array('subject_id' => 10, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '1/18 - PM December workshop completed; January workshop in progress',  ));


        Comment::create(array('subject_id' => 11, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => 'Consider running in parallel to A&R Pilot',  ));
        Comment::create(array('subject_id' => 11, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/4 - Q2 audit recommnendation for A&R and we need to work out how to report back in a un-fragmented way.*Need to consider renaming?',  ));
        Comment::create(array('subject_id' => 11, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '11/6 progressing to plan and will be presented to PB next week.Need to request PM',  ));
        Comment::create(array('subject_id' => 11, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '30/6 SN - Exec summaries approved at CRB and 10% planning credit approved.Rich sent request or R&DIS resources to Dan.  ',  ));
        Comment::create(array('subject_id' => 11, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '* G1 documents in progress - working toward an August 20th Program Board approval',  ));
        Comment::create(array('subject_id' => 11, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '26/8 SN - G1 approved at PB and SME identified. ',  ));
        Comment::create(array('subject_id' => 11, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '10/11 - SoW with Tessella in place; Hack-a-thon planned for late Nov',  ));
        Comment::create(array('subject_id' => 11, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '23/11 - PM Zaheer Mirza started today; Workshop pushed into Dec   ',  ));
        Comment::create(array('subject_id' => 11, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '1/18 - PM December workshop completed; January workshop in progress',  ));

        Comment::create(array('subject_id' => 12, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/6 SN - New project, PI?',  ));
        Comment::create(array('subject_id' => 12, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '30/6 - Exec summaries approved at CRBand 10% planning credit approved.Steve requested PI  and will change from opex to cap in SmC.2/7 PI created.',  ));
        Comment::create(array('subject_id' => 12, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '* Approved by CRB and Program Board (7-29-2015)',  ));
        Comment::create(array('subject_id' => 12, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '20/8 - progressing with Tessella and team to engage and setup governance',  ));
        Comment::create(array('subject_id' => 12, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '10/11 - 2 of 5 work packages completed; Infrastructure caused 1 week delay; Issue escalated to the Project Team for mitigation',  ));
        Comment::create(array('subject_id' => 12, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '1/18 - Progressing as scheduled toward Mar 2016 completion date',  ));

        Comment::create(array('subject_id' => 13, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => 'identifying the Senior Business lead is the blocker.Tanya has sent chasing email to SH, ideally need PM and SBL co located, dependant on SBL location. Need to ensure common Lang delivers against SLWP & Protocol requirements.',  ));
        Comment::create(array('subject_id' => 13, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '15/04 Update: Matt Faletti announcement to be shared with IS delivery team. We need to agree principles for this project which will enable us to manage wider discussions on this topic. We need a way to govern decisions on terms.',  ));
        Comment::create(array('subject_id' => 13, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => 'When does the business need people to be compliant/conform? ',  ));
        Comment::create(array('subject_id' => 13, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => 'Does the concept paper go into detail of a do nothing option?',  ));
        Comment::create(array('subject_id' => 13, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/4 - PM nominated (Susan Hennenkamp) waiting approval',  ));
        Comment::create(array('subject_id' => 13, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/5 Susan leaving and Matt & Sharon will progress until PM identified',  ));
        Comment::create(array('subject_id' => 13, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '30/6 - Rich meeting with Sharon, Matt, Tom next week to look at how they will work with protocol and SLWP. Rich to send PM job spec to Charles for escalation.  Do nothing option was reviewed by Rich.  However, the update was not able to be applied due to access rights.  Rich is working through the PM acquisition process with two potential candidates. ',  ));
        Comment::create(array('subject_id' => 13, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '* Neither Protocol nor SLWP have yet provided Common Language requirements meeting with Pete next week to discuss Protocol/SLWP requirements',  ));
        Comment::create(array('subject_id' => 13, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '20/8 SN - Rich is proposing we run without a PM - need to define operating model / ways of working/ project integration with internal and ext. OB core team. will need to present proposal to CRB when ready. ',  ));
        Comment::create(array('subject_id' => 13, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '10/11 - Common Language approach has been approved by the CRB; In progress ""test"" of Protocol and SLWP terms for review and delivery; Present outcomes from ""test"" back to CRB at Dec F2F. ',  ));
        Comment::create(array('subject_id' => 13, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '23/11 - Common Language in process of verifying definitions within the Blue Print',  ));
        Comment::create(array('subject_id' => 13, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '18/1 - Common Language established standardized terms with Protocol.',  ));

        Comment::create(array('subject_id' => 14, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => 'Review mid May, need to consider the recommendations/quick wins  from Tesella. Audit actions require a strategy by end of Q2.',  ));
        Comment::create(array('subject_id' => 14, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => 'Key resource has resigned need to odentify new resource, who will take this forward?',  ));
        Comment::create(array('subject_id' => 14, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/4 JB working on SOW to continue to use Tesella.',  ));
        Comment::create(array('subject_id' => 14, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/5 This is a dependancy on audit - ',  ));
        Comment::create(array('subject_id' => 14, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '*29/5 Charles to update the data principles document (what to migrate/not migrate/data quality)',  ));
        Comment::create(array('subject_id' => 14, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '29/6 SN - Amended next gate date 9 July (prev 18 June) and moved gate passed from pre G0 to G1.',  ));
        Comment::create(array('subject_id' => 14, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '30/6 SN -  CRB and auditors approved exec summary, Rich sent request or R&DIS resources to Dan.  Changed completion date from Dec 15 to 31st March 16.Data principles doc finalized and evidence provided to audit.',  ));
        Comment::create(array('subject_id' => 14, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '* Approved by CRB and Program Board (7-29-2015)',  ));
        Comment::create(array('subject_id' => 14, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '20/8 SN - not engaged with Tessella yet - start Sep',  ));
        Comment::create(array('subject_id' => 14, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '2/9 [SN] SMEs to be confirmed and ready to start this week.',  ));
        Comment::create(array('subject_id' => 14, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '10/11 - SME interview completed; High level options of the proposal being formed ',  ));
        Comment::create(array('subject_id' => 14, 'subject_type' => 'Project' ,'user_id' => 1, 'comment' => '1/18 - Progressing as scheduled toward Mar 2016 completion data',  ));


    }
}
