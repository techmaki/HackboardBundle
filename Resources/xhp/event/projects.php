<?php

class :hb:event:projects extends :symfony:base {

  attribute
    array projects @required;

  public function render() {
    $projects = $this->getAttribute('projects');

    $html = array();
    foreach ($projects as $project) {
      $summary = $project->getSummary();

      if (empty($summary)) {
        $summary = <small>No summary</small>;
      } else {
        $summary = <p>{$summary}</p>;
      }

      $html[] =
        <div>
          <h3>{$project->getName()}</h3>
          {$summary}
        </div>;
    }

    return
      <div>
        {$html}
      </div>;
  }

}
