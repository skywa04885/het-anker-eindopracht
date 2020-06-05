document.onreadystatechange = () =>
{
  // ==== Checks if we may proceed ====
  if (document.readyState === 'complete')
  {
    // ==== Adds the loader event to most anchor tags ====

    // Gets the anchor tags
    const anchors = document.getElementsByTagName('a');
    // Assigns the click events
    if (anchors) for (let i = 0; i < anchors.length; i++)
    {
      // Adds the click listener
      anchors[i].addEventListener('click', (e) => {
        // Prevents the default one
        e.preventDefault();

        // Sets the timeout and clicks
        setTimeout(() => {}, 250);
      });
    }
  }
}