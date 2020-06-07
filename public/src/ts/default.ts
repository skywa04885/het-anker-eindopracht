document.onreadystatechange = () =>
{
  // ==== Checks if we may proceed ====
  if (document.readyState === 'complete')
  {
    // ==== Adds the loader event to most anchor tags ====

    const loader = document.getElementById('loader');

    // Gets the anchor tags
    const anchors = document.getElementsByTagName('a');
    // Assigns the click events
    if (anchors) for (let i = 0; i < anchors.length; i++)
    {
      // Adds the click listener
      anchors[i].addEventListener('click', e => {
        // Prevents the default one
        e.preventDefault();

        // Enables the loader
        loader?.setAttribute("style", "display:block;");

        // Sets the timeout and clicks
        setTimeout(() => {
          let url = (<HTMLTextAreaElement>e.target).getAttribute('href');
          if (!url) url = '/';
          window.location.href = url;
        }, 250);
      });
    }
  }
}