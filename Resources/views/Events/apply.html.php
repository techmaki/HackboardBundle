<?php 
$view->extend('TechmakiHackboardBundle::base.html.php');

if ($valid) {
  $valid =
    <twitter:alert type="success">
      Your entry was successful. <br />
      Thank you for applying!
      <p>
        If you are working with a team, please submit their details as well.
      </p>
    </twitter:alert>;
} else if ($valid === false) {
  $valid =
    <twitter:alert>
      There was a problem with your form. <br />
      Please try again.
    </twitter:alert>;
}

$xhp =
<hb:event event={$event}>
  {$valid}
  <h2>Apply</h2>
  <symfony:form
    formview={$formview}
    method="post"
    route="techmaki_hackboard_events_apply"
    params={array('id' => $event->getID())} >
    <symfony:form:errors formview={$formview} />
    <symfony:twitter:field formview={$formview['name']}>
      Name
    </symfony:twitter:field>
    <symfony:twitter:field formview={$formview['email']}>
      Email
    </symfony:twitter:field>
    <symfony:twitter:field formview={$formview['mobile']}>
      Mobile Number
    </symfony:twitter:field>
    <symfony:twitter:field formview={$formview['skills']}>
      Skills
    </symfony:twitter:field>
    <symfony:twitter:field formview={$formview['project_idea']}>
      Project Idea
    </symfony:twitter:field>
    <twitter:field>
      <symfony:label formview={$formview['team_members']}>
        Team Members
      </symfony:label>
      <twitter:input>
        <symfony:input formview={$formview['team_members']} />
        <span class="help-block">
          Put each person&rsquo;s name and mobile number
        </span>
      </twitter:input>
    </twitter:field>
    <symfony:twitter:field formview={$formview['referal']}>
      Referal
    </symfony:twitter:field>
    <symfony:twitter:field formview={$formview['facebook']}>
      Facebook
    </symfony:twitter:field>
    <symfony:twitter:field formview={$formview['twitter']}>
      Twitter
    </symfony:twitter:field>
    <symfony:twitter:field formview={$formview['github']}>
      Github
    </symfony:twitter:field>
    <div class="actions">
      <twitter:submit value="Submit" />
    </div>
  </symfony:form>
</hb:event>;

echo $xhp->toString();
