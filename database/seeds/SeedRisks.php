<?php

use Illuminate\Database\Seeder;
use tracker\Models\Risk;

class SeedRisks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risks')->delete();

        /* 01 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Stakeholder burnout if we demand too much of their time', 'description' => 'There is a risk of a stakeholder burnout if we demand too much of their time for the One Biology project. Transferred from BCM Ref. 207
 Risk Owner is Liz Harrison-Turtle (currently not set up on RMIS)' ));

        /* 02 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Lack of business ownership at implementation due to lack of SME/SBL involvement during design and delivery', 'description' => 'There is a risk that the demands of stakeholder day jobs don\'t allow for adequate time for contribution to One Biology project work and this impacts business ownership at implementation or design
This is accentuated in the first quarter 2015.' ));
        /* 03 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Alignment with MINT', 'description' => 'There is a risk that:
1. MINT and One Biology do not align properly
2. To do it will be very time consuming
3. Risk that MINT will not deliver some functionalities -> time line change with MINT will impact OB
4. MINT model is based on regions vs. OB model based on functionalities
This Risk has been transferred from BCM Re. 25' ));
        /* 04 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Alignment with LINK', 'description' => 'There is a risk that LINK and One Biology don\'t align properly. This is a generic non-alignment risk with LINK. Transferred from BCM Ref. 33' ));
        /* 05 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>4 , 'title' => 'Strategic Electronic Data Capture ', 'description' => 'There is a risk that new processes, ways of working and technology are implemented and embedded in Biological Assessment that do not fit with the global One Biology work execution processes.
EDC is one of the areas that One Biology will tackle in the Work Execution Stream which is not started yet. In the mean time there are 3 pilots/POC already initiated to look at temporary solutions:
- Biological Assessment EDC investigation Sponsored by Juerg Hodler
- Continuous Nursery Pilot sponsored by DEX
- APAC Pilot sponsored by ??
Although all these investment will have depreciated by the time One Biology delivers the global solution, these organizations will have been running with their own point solutions which embeds new WoW. The One Biology program team has made it clear that we will not commit to accepting any tools before we have assessed the Work Execution processes. Never the less we anticipate that this will reduce the desire to adopt the One Biology solution.

Transferred from BCM, ref. 42
Risk Owner should be Pete Munro' ));
        /* 06 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'The One Biology Program receives less funding than originally expected initially in 2015 and in addition a continuing or flat or near flat funding levels sustained for subsequent years.', 'description' => 'The One Biology Program receives less funding than originally expected initially in 2015 and in addition a continuing or flat or near flat funding levels sustained for subsequent years.' ));
        /* 07 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Projects and work stream planning without contingency', 'description' => 'Projects and work stream planning without contingency and\or consistency as budget challenges impact both the project planning oversight resource profile and contingency available.

Risk Owner should be Steve Wemyss - reassign when user account created' ));
        /* 08 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Effect of R&D OD and strategy changes on OB Blueprint', 'description' => 'There is a risk that the changing R&D organizational design and strategy affects the validity of the One Biology Blueprint in the following ways:
1.	Number and location of R&D sites
2.	Structure and use of commercial partners to deliver R&D services
3.	Standardization ?
(This is higher risk for a site dependent POC)' ));
        /* 09 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Common Language scope and adoption', 'description' => 'There is a risk that the scope of Common Language is expected or required to be greater than the scope required for the One Biology program
' ));
        /* 10 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Complexity of One Biology Data Transport work', 'description' => 'There is a risk that the scope of One Biology Data Transport work is much larger in terms of the depth of detail required or the breadth of the services uncovered to draw a business case conclusion
' ));
        /* 11 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Required changes to IS landscape', 'description' => 'There is a risk that the One Biology requirements of the IS landscape cannot be achieved in the time frames required by the program' ));
        /* 12 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'R&D appetite for change', 'description' => 'There is a risk that the R&D organization lacks the ability to absorb the changes required by One Biology. Due to change fatigue, resource issues, organizational change, unclear or untimely training, R&D culture change (freedom-to-innovate to standardized practices).
The compatibility of proposed changes also need to be considered.
' ));
        /* 13 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Alignment with R&D IS Strategies', 'description' => 'There is a risk that the R&D IS strategies do not align with One Biology objectives (examples. SmartChoice, Public Private Cloud initiatives)' ));
        /* 14 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Insufficient time to achieve Contra Season delivery needs', 'description' => 'Escalate Risk R2043 â€œInsufficient time to achieve Contra Season delivery needs â€“ ongoing assessment of plans as requirements and potential solutions emerge.  Critical review at R1/G2 end Jan 2015

Due to later than expected start there is a risk that the contra season delivery milestone may be missed due to there being insufficient time to complete required activities and/or respond to emerging issues.
Dave Stockey should be Risk and Action owner' ));
        /* 15 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Cost effective global solution', 'description' => 'There is a risk that a cost effective global solution cannot be achieved due to OpEx constraints and local variation of requirements, diminishing the benefits case for One Biology.
' ));
        /* 16 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Artemis organizational transformation initiative is superceded by the Accelerating Operational Leverage initiative ', 'description' => 'There is a risk that the Artemis(*) organizational transformation initiative is not implemented in Biological Assessment in North America. This would create two organizational structures for One Biology to deploy into and therefore increase the amount of work needed to understand and implement changes arising from One Biology

* Artemis was (and may still be unless superceded by AOL) an organizational transformation program delivering new, aligned org structures in LATAM, APAC and EAME' ));
        /* 17 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Impact of AOL initiatives and alignment with One Biology', 'description' => 'There is a risk that AOL initiatives could be in conflict in terms of timing, resource requirements, objectives and requirements to One Biology. ' ));
        /* 19 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Availability and accessability of historic trial data', 'description' => 'There is a risk that benefits associated with accessible historic trial data will be difficult to achieve because:

It comes from many different existing systems and spreadsheets, with an extra cost to develop tools to migrate each different source.

Data quality is variable and will require business resources to clean and validate.

Trial data is complex, with many different related elements.

Migrating data part way through a trial is unlikely to be practical, so data migration timing will need to be carefully planned.

(Taken from Internal Audit report findings)
' ));
        /* 20 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Reporting and Analysis work stream lagging behind other work streams', 'description' => 'There is a risk that prioritized implementations may go ahead without a clear understanding of the information that is needed to support the analytics and reporting requirements because
the analysis and reporting workstream has only recently formed and has not yet been able to contribute to the proofs of concept.' ));
        /* 21 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Limitations of 2016 Opex Budget', 'description' => 'There is a risk to 2016 deliverables due to the reduced program expense budget. The 2016 budget will be a challenge due to increased activity in current Phase 2B projects and the commencement of Phase 2C.' ));
        /* 22 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Delay During Implementation ', 'description' => 'There is a risk of delay during implementation due to the reliance on multiple third party suppliers. ' ));
        /* 23 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Impact of Dependencies on Implementation of SLWP and Protocol', 'description' => 'There is a risk that without full understanding of dependencies both within the program and external to the program will cause issues for the implementation of Site Level Work Placement and Protocol.' ));
        /* 24 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>3 , 'title' => 'Understanding of Agile Methodology', 'description' => 'Lack of understanding and experience of Agile methodology could lead to reduced minimum marketable set and budget overrun.' ));
        /* 25 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>2 , 'title' => 'Failure to Deliver Harmonised Solution', 'description' => 'Failure to Deliver Harmonised Solution' ));
        /* 26 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>15 , 'title' => 'User Coverage in A&R', 'description' => 'There is a risk that we do not have coverage across all statisticians and trialists that touch data in Analysis & Reporting' ));
        /* 27 */ Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>1, 'action_owner'=>15 , 'title' => 'Data Structure Knowledge Transfer', 'description' => 'There is a risk that knowledge gained through the Trialing Data Structure project might not be fully transfered to Syngenta resources.' ));



        //Risk::create(array('subject_id' => 1, 'subject_type' => 'Program' ,'status' => 'Open', 'probability' => 2, 'previous_probability'=>1, 'impact' => 3, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2 , 'title' => 'Flowers and Veg Seeds', 'description' => 'Flowers and Veg may be brought back in scope now the divestment is cancelled' ));

        Risk::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'status' => 'Open', 'probability' => 1, 'previous_probability'=>2, 'impact' => 3, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2 , 'title' => 'Environments', 'description' => 'There may be a delay in the environments being ready in production' ));
        Risk::create(array('subject_id' => 2, 'subject_type' => 'WorkStream' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => true, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Key Resources Leaving', 'description' => 'Losing both Neil and Marcin' ));

        Risk::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Risk', 'description' => 'This is an example' ));
        Risk::create(array('subject_id' => 1, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => true, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Issue', 'description' => 'This is an example' ));

        Risk::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Risk', 'description' => 'This is an example' ));
        Risk::create(array('subject_id' => 2, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => true, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Issue', 'description' => 'This is an example' ));

        Risk::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Risk', 'description' => 'This is an example' ));
        Risk::create(array('subject_id' => 3, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => true, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Issue', 'description' => 'This is an example' ));

        Risk::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => false, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Risk', 'description' => 'This is an example' ));
        Risk::create(array('subject_id' => 4, 'subject_type' => 'Project' ,'status' => 'Open', 'probability' => 2, 'impact' => 2, 'previous_impact'=>1, 'is_an_issue' => true, 'NextReviewDate' => \Carbon\Carbon::now()->addDays(14), 'owner'=>2,  'title' => 'Example Issue', 'description' => 'This is an example' ));

    }
}
