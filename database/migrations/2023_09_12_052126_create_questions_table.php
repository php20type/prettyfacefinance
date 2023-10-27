<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('question')->nullable();
            $table->timestamps();
        });

        Schema::create('quiz_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qid')->nullable();
            $table->text('option')->nullable();
            $table->timestamps();
        });

        Schema::create('quiz_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qid')->nullable();
            $table->integer('option_number')->nullable();
            $table->timestamps();
        });

        $createMultiplquestion = [
            ['question'=>'What does FCA stand for?'],
            ['question'=>"Why do you think the FCA need to check people's information before they can become approved?"],
            ['question'=>"Can an IAR help the customer decide about finance and what they should do?"],
            ['question'=>"Why do you think the FCA are so strict on what 'financial promotions' can say?"],
            ['question'=>"Which of these sentences are giving advice"],
            ['question'=>"Describe simply what you think a Financial Promotion is?"],
        ];
        DB::table('questions')->insert($createMultiplquestion);

        $creatOptions = [
            ['qid'=>1,'option'=>'Finance Central Association'],
            ['qid'=>1,'option'=>'Financial Conduct Authority'],
            ['qid'=>1,'option'=>'Freedom Control Act'],
            ['qid'=>2,'option'=>'To ensure that the individual has the right to live and work in the United Kingdom'],
            ['qid'=>2,'option'=>'To ensure you are considered ‘Fit & Proper’. The FCA look for; honesty (including being open about disclosing information) Integrity and Reputation, Competence and Capability'],
            ['qid'=>2,'option'=>'To ensure you are visible on the electoral register'],
            ['qid'=>3,'option'=>'Yes'],
            ['qid'=>3,'option'=>'No'],
            ['qid'=>4,'option'=>'To protect consumers in line with Consumer Duty. (You may also hear this described as Treating Customers Fairly)'],
            ['qid'=>4,'option'=>'To ensure the images used are enticing for customers'],
            ['qid'=>4,'option'=>'To ensure you know how to use social media platforms correctly'],
            ['qid'=>5,'option'=>'Please contact this company their details are on the leaflet.'],
            ['qid'=>5,'option'=>"Yes we can offer finance and it's very cheap to use."],
            ['qid'=>5,'option'=>"You can get finance over 36 months check it online."],
            ['qid'=>5,'option'=>"Everything you need to know is on CFG website."],
            ['qid'=>5,'option'=>"We can't advise you on finance but you can use our credit broker CFG if you wish."],
            ['qid'=>5,'option'=>"We do the best deals in the beauty industry and it's easy to apply."],
            ['qid'=>6,'option'=>'A financial promotion is a paid advertisement on Instagram or facebook'],
            ['qid'=>6,'option'=>'A financial promotion is an invitation or inducement to engage in finance related activity, communicated by a person in business.'],
            ['qid'=>6,'option'=>'A financial promotion is a special offer'],
        ];
        DB::table('quiz_options')->insert($creatOptions);

        $creatAnswer = [
            ['qid'=>1,'option_number'=>2],
            ['qid'=>2,'option_number'=>5],
            ['qid'=>3,'option_number'=>8],
            ['qid'=>4,'option_number'=>9],
            //['qid'=>5,'option_number'=>11],
            ['qid'=>6,'option_number'=>19],
        ];
        DB::table('quiz_answer')->insert($creatAnswer);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
        Schema::dropIfExists('quiz_options');
        Schema::dropIfExists('quiz_answer');
    }
}
