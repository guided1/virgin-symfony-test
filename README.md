Virgin Developer Test
========================

Constraint: We also have three packages (S/M/L), so that all channels in a given package are present in all the larger ones. (And obviously S<M<L)

I didn't quite stick to this requirement. Instead I made it so that packages can be composed of other packages rather than making them inherit other packages channels. The result is the same but gives more flexibility when creating packages.


