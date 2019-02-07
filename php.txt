php 는 page 종료가 될때 GC(gabage collector)에 의해서 모든 reousrce를 반환하도록 되어 있습니다. 즉 mysql open은 page가 종료되는 시점에서 자동으로 close가 됩니다.

그럼 왜 close를 해야 하느냐에 대한 의문이 남을 수 있는데

1. connection을 끊고 다른 connection을 사용하고 싶을 때
2. 시간이 긴 page 처리에서, db connection 이 전반부에서만 사용될 때의 resource 중복 낭비를 위해서..

처리하는 page의 속도가 아주 빠르다거나, 또는 resource 사용량이 많지 않다면 굳이 close를 하지 않아도 상관은 없습니다만, 이건 일반적인 견해이고, logic에 따라 close를 해 주시는 것이 더 효율적일 수 있습니다.
 다만 이 효율이라는 것이 resource 관점일 뿐, 다른 비용을 추가했을 경우에는 close에 신경을 쓰는 것이 더 비효율적일 수도 있습니다. :-)