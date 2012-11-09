# Capture the Flag: Boxed Edition

## Vision

This project aims to provide a semantic equivalent to the excellent [Stripe Capture the Flag: Web Edition](https://github.com/stripe-ctf/stripe-ctf-2.0) 
in a boxed edition in order to allow anyone to explore the levels on his/her own, or ideally host it for a team as well.

### Origin / Goals

[Stripe](https://github.com/stripe) ran the second edition of their [Stripe CTF](https://github.com/stripe-ctf) from August 22-29, 2012, greatly improving on the success of the first edition 
with a nice storyline, interesting and challenging levels, a visually appealing dashboard, and a leaderboard as well 
(see the announcing blog post [Capture the Flag 2.0](https://stripe.com/blog/capture-the-flag-20) for details).

This competition sparked the interest of many, yet not everybody has been able to follow through all levels before the deadline. 
Also, some participants expressed interest to host a similar competition for their fellow team members occasionally.

Fortunately Stripe announced to make the code available on GitHub later on, which is [meanwhile available](https://stripe.com/blog/capturetheflag) - 
this 'only' covers the source code to the actual levels though and lacks both the dashboard UI as well as the hosting environment, 
making exploration of the levels a bit less appealing for yourself already, and is not really fit e.g. for hosting a similar competition for your team. 
Also, the documented [System Design: Stripe Capture the Flag](https://blog.gregbrockman.com/2012/08/system-design-stripe-capture-the-flag/) is highly tailored to their dedicated hosting 
scenario with respective scalability and security needs, which do not necessarily apply to the use case at hand.

This project aims to remedy this by filling the gaps via a pragmatic approach still, as follows:

#### Short Term

The short term goal is to convert each level to a self contained app, ready to be deployed on Cloud Foundry; like so everyone should be able to explore a level after a simple `vmc push`. 
Every level is going to be approached in an isolated fashion initially, thus the minimum viable release will just contain each level as a readily deployable app, but no orchestration - 
rather the 'glue' might be just a series of blog/wiki posts, providing respective guidance for an individual walk through all the levels.

#### Mid Term

Having to start each level separately (and lacking the coordinated set of secrets as well eventually) is obviously less engaging, so ideally an orchestrating management app can be made available 
as well. It should simply be a pragmatic solution deployable to Cloud Foundry itself, which could in turn provision the next level's app while progressing from one level to another  
(whether this strictly functional management app might even get enriched by an attractive user interface solely depends on a respectively talented developer/designer jumping in ...).

#### No Term

An explicit non goal is any kind of scalability (neither performance nor security wise), the use case specifically targets individuals or development teams rather than the entire world; 
still, the envisioned design might actually provide a nice testing scenario for Cloud Foundry scalability though, if everything works out as expected.

## Credits

Obviously all the credits for the inspiration and especially the levels belong to the Stripe team, kudos for hosting such an engaging event and raising awareness for security best practices on the fly!
