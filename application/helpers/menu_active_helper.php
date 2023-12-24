<?php
function active_class($segment, $urlName)
{
  if ($segment == $urlName) {
    echo "active";
  }
}

function show_class($segment, $urlName)
{
  if ($segment == $urlName) {
    echo "show";
  }
}
